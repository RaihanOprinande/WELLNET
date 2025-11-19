<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\LogPelanggaran;
use App\Models\User;
use App\Models\UserChildren;
use App\Models\UserSetting;
use App\Models\AppUsageLog;
use App\Models\LogQuiz;
use App\Models\TemaQuiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $pengguna = User::whereIn('role',['personal','parent'])->count();
        $children = UserChildren::count();

        $JumlahPengguna = $pengguna + $children;

        $settingTertinggi = UserSetting::orderBy('skor', 'desc')->first();

        $namaPengguna = 'N/A';
        $skorTertinggi = 0;
        $rolePengguna = 'Tidak Ada';

        if ($settingTertinggi) {
            $skorTertinggi = $settingTertinggi->skor;

            if ($settingTertinggi->child_id !== null) {
                $child = UserChildren::find($settingTertinggi->child_id);
                if ($child) {
                    $namaPengguna = $child->username;
                    $rolePengguna = 'Anak';
                }
            } else  {
                $user = User::find($settingTertinggi->user_id);
                if ($user) {
                    $namaPengguna = $user->username;
                    $rolePengguna = $user->role;
                }
            }
        }

        // MENGAMBIL DATA UNTUK CHART PELANGGARAN
        // 1. Tentukan Rentang Waktu (Bulan Saat Ini)
        $now = Carbon::now();
        // Gunakan startOfWeek() untuk memastikan pemetaan hari benar (Senin-Minggu)
        $startOfMonth = $now->copy()->startOfMonth()->toDateString();
        $endOfMonth = $now->copy()->endOfMonth()->toDateString();

        // 2. Ambil data, filter berdasarkan bulan, dan kelompokkan berdasarkan hari dalam seminggu
        $logs = LogPelanggaran::select(
                // MySQL DAYOFWEEK (1=Minggu, 2=Senin... 7=Sabtu)
                DB::raw('DAYOFWEEK(created_at) as day_index'),
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('day_index')
            ->orderBy('day_index', 'asc')
            ->get();

        // 3. Inisialisasi array untuk memastikan semua hari ada (walaupun nol)
        Carbon::setLocale('id');
        $daysOfWeek = [];

        // Inisialisasi array dengan label hari (Senin sampai Minggu)
        for ($i = 1; $i <= 7; $i++) {
            // MySQL DAYOFWEEK: 1=Minggu, 2=Senin, ..., 7=Sabtu
            $dayName = Carbon::now()->startOfWeek()->addDays($i - 2)->isoFormat('dddd');
            $daysOfWeek[$i] = ['label' => $dayName, 'value' => 0];
        }

        // 4. Isi data yang ditemukan (Perbaikan Error)
        foreach ($logs as $log) {
            $dayIndex = (int) $log->day_index;

            // Akses array PHP secara langsung, bukan melalui Collection (memperbaiki error)
            if (isset($daysOfWeek[$dayIndex])) {
                $daysOfWeek[$dayIndex]['value'] = (int) $log->total;
            }
        }

        $chartData = $this->sortDaysForChart(array_values($daysOfWeek));

        // 5. Kembalikan data dalam urutan yang mudah dibaca (Senin - Minggu)
        // Nilai dikonversi kembali ke array agar sortDaysForChart bisa memprosesnya


        // dd($this->sortDaysForChart($daysOfWeek->values()->all()));

        // ===============================
        // GRAFIK DISTRIBUSI LENCA
        // ===============================

        // Ambil jumlah user berdasarkan lencana
        $lencanaStats = UserSetting::select('lencana', DB::raw('COUNT(*) as total'))
            ->groupBy('lencana')
            ->orderBy('lencana', 'asc')
            ->get();

        // Siapkan label dan data
        $lencanaLabels = $lencanaStats->pluck('lencana');
        $lencanaValues = $lencanaStats->pluck('total');

        // ===============================
// PELANGGARAN PALING SERING DILAKUKAN
// ===============================
$pelanggaranTerbanyak = LogPelanggaran::select(
        'pelanggaran',
        DB::raw('COUNT(*) as total')
    )
    ->groupBy('pelanggaran')
    ->orderBy('total', 'desc')
    ->first();

$pelanggaranTerbanyakNama = $pelanggaranTerbanyak->pelanggaran ?? 'Tidak ada data';
$pelanggaranTerbanyakTotal = $pelanggaranTerbanyak->total ?? 0;


// ===============================
// GRAFIK QUIZ HARIAN MINGGU INI
// ===============================
$startOfWeek = Carbon::now()->startOfWeek()->toDateString(); // Senin
$endOfWeek = Carbon::now()->endOfWeek()->toDateString();     // Minggu

$quizDailyLogs = LogQuiz::select(
        DB::raw('DAYOFWEEK(created_at) as day_index'),
        DB::raw('COUNT(DISTINCT setting_id) as total_user')
    )
    ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
    ->groupBy('day_index')
    ->orderBy('day_index', 'asc')
    ->get();

// Inisialisasi semua hari agar selalu ada (Senin–Minggu)
Carbon::setLocale('id');
$daysOfWeekQuiz = [];
for ($i = 1; $i <= 7; $i++) {
    // MySQL DAYOFWEEK: 1=Minggu, 2=Senin,...7=Sabtu
    $dayName = Carbon::now()->startOfWeek()->addDays($i - 1)->isoFormat('dddd');
    $daysOfWeekQuiz[$i] = ['label' => $dayName, 'value' => 0];
}

// Isi data jika ada log
foreach ($quizDailyLogs as $log) {
    $dayIndex = (int) $log->day_index;
    // DAYOFWEEK: 1=Minggu, 2=Senin,...7=Sabtu
    // Kita ingin Senin=0 index pertama, jadi shift array
    if ($dayIndex == 1) { // Minggu
        $dayIndex = 7;
    } else {
        $dayIndex -= 1;
    }
    $daysOfWeekQuiz[$dayIndex + 1]['value'] = $log->total_user;
}

$quizChartData = array_values($daysOfWeekQuiz);
// ===============================
// TOP 5 APLIKASI PALING SERING DIPAKAI
// ===============================

$topApps = AppUsageLog::select(
        'app_name',
        DB::raw('SUM(used_minutes) as total_used')
    )
    ->groupBy('app_name')
    ->orderBy('total_used', 'desc')
    ->limit(5)
    ->get();

$topAppLabels = $topApps->pluck('app_name');
$topAppValues = $topApps->pluck('total_used');




        return view('welcome',compact('JumlahPengguna','namaPengguna','chartData','lencanaLabels',
    'lencanaValues',   'pelanggaranTerbanyakNama',
'pelanggaranTerbanyakTotal',
    'topAppLabels',
    'topAppValues',
     'quizChartData'  // <- ini tambahan untuk grafik quiz harian
    ));

    }

        private function sortDaysForChart(array $data)
    {
        // Logika sederhana untuk mengurutkan kembali Minggu (index 0) ke belakang
        $minggu = $data[0];
        $sorted = array_slice($data, 1);
        $sorted[] = $minggu;
        return $sorted;
    }
}
