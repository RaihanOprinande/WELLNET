<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogPelanggaran;
use App\Models\User;
use App\Models\UserChildren;
use App\Models\UserSetting;
use App\Models\AppUsageLog;
use App\Models\LogQuiz;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id'); // Set locale untuk nama hari

        // ===============================
        // Statistik Pengguna
        // ===============================
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

        // ===============================
        // Grafik Pelanggaran Bulanan
        // ===============================
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth   = Carbon::now()->endOfMonth()->toDateString();

        $pelanggaranLogs = LogPelanggaran::select(
                DB::raw('DAYOFWEEK(created_at) as day_index'),
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('day_index')
            ->orderBy('day_index', 'asc')
            ->get();

        $daysOfWeekPelanggaran = [];
        for ($i = 1; $i <= 7; $i++) {
            $dayName = Carbon::now()->startOfWeek()->addDays($i - 1)->isoFormat('dddd');
            $daysOfWeekPelanggaran[$i] = ['label' => $dayName, 'value' => 0];
        }

        foreach ($pelanggaranLogs as $log) {
            $dayIndex = (int) $log->day_index;
            $dayIndex = $dayIndex == 1 ? 7 : $dayIndex - 1;
            if (isset($daysOfWeekPelanggaran[$dayIndex])) {
                $daysOfWeekPelanggaran[$dayIndex]['value'] = (int) $log->total;
            }
        }

        $chartData = $this->sortDaysForChart(array_values($daysOfWeekPelanggaran));

        // ===============================
        // Distribusi Lencana
        // ===============================
        $lencanaStats = UserSetting::select('lencana', DB::raw('COUNT(*) as total'))
            ->groupBy('lencana')
            ->orderBy('lencana', 'asc')
            ->get();

        $lencanaLabels = $lencanaStats->pluck('lencana');
        $lencanaValues = $lencanaStats->pluck('total');

        // ===============================
        // Pelanggaran Terbanyak
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
        // Grafik Quiz Mingguan
        // ===============================
        $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
        $endOfWeek   = Carbon::now()->endOfWeek()->toDateString();

        $quizLogs = LogQuiz::select(
                DB::raw('DAYOFWEEK(created_at) as day_index'),
                DB::raw('COUNT(DISTINCT setting_id) as total_user')
            )
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('day_index')
            ->orderBy('day_index', 'asc')
            ->get();

        $daysOfWeekQuiz = [];
        for ($i = 1; $i <= 7; $i++) {
            $dayName = Carbon::now()->startOfWeek()->addDays($i - 1)->isoFormat('dddd');
            $daysOfWeekQuiz[$i] = ['label' => $dayName, 'value' => 0];
        }

        foreach ($quizLogs as $log) {
            $dayIndex = (int) $log->day_index;
            $dayIndex = $dayIndex == 1 ? 7 : $dayIndex - 1;
            if (isset($daysOfWeekQuiz[$dayIndex])) {
                $daysOfWeekQuiz[$dayIndex]['value'] = (int) $log->total_user;
            }
        }

        $quizChartData = array_values($daysOfWeekQuiz);

        // ===============================
        // Top 5 Aplikasi
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

        // ===============================
        // Return view
        // ===============================
        return view('welcome', compact(
            'JumlahPengguna',
            'namaPengguna',
            'chartData',             // Grafik Pelanggaran
            'lencanaLabels',
            'lencanaValues',
            'pelanggaranTerbanyakNama',
            'pelanggaranTerbanyakTotal',
            'quizChartData',         // Grafik Quiz Mingguan
            'topAppLabels',
            'topAppValues'
        ));
    }

    private function sortDaysForChart(array $data)
    {
        // Menggeser Minggu ke akhir array
        $minggu = $data[0];
        $sorted = array_slice($data, 1);
        $sorted[] = $minggu;
        return $sorted;
    }
}
