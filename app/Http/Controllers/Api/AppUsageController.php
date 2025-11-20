<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppUsageLog;
use App\Models\AppLimit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User; // Pastikan model User diimpor jika diperlukan relasi

class AppUsageController extends Controller
{
    // ❌ Matikan Testing Mode secara default jika Anda sudah menggunakan otentikasi token.
    // Jika Anda masih perlu testing mode, ganti ke 'true'. Untuk produksi, harus 'false'.
    private const TESTING_MODE = false;
    private const TESTING_USER_ID = 9;

    /**
     * Helper untuk mendapatkan User ID. Memprioritaskan ID dari query parameter
     * (yang dikirim Flutter setelah login) jika TESTING_MODE non-aktif.
     */
    private function getUserId(Request $request)
    {
        if (self::TESTING_MODE && $request->has('testing_user_id')) {
            return (int) $request->input('testing_user_id');
        }

        // Coba ambil ID dari query parameter (seperti yang dikirim AppUsageApiService)
        if ($request->has('user_id')) {
            return (int) $request->input('user_id');
        }

        // Fallback: Ambil dari token otentikasi (jika route dilindungi middleware('auth'))
        return Auth::id();
    }

    /**
     * Sync usage data dari Flutter
     */
    public function syncUsageData(Request $request)
    {
        Log::info('🔵 Sync request received', [
            'data_count' => count($request->input('usage_data', [])),
        ]);

        $validator = Validator::make($request->all(), [
            'usage_data' => 'required|array',
            'usage_data.*.package_name' => 'required|string',
            'usage_data.*.app_name' => 'required|string',
            'usage_data.*.used_minutes' => 'required|integer|min:0',
            'usage_data.*.usage_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            Log::error('❌ Validation failed', ['errors' => $validator->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $userId = $this->getUserId($request); // Ambil ID yang benar

            if (!$userId) {
                Log::error('❌ No user ID found for sync request');
                return response()->json([
                    'success' => false,
                    'message' => 'User ID required'
                ], 401);
            }

            $usageData = $request->usage_data;
            $syncedCount = 0;
            $limitWarnings = [];

            DB::beginTransaction();

            foreach ($usageData as $data) {
                // Ambil app limit
                $appLimit = AppLimit::where('user_id', $userId)
                    ->where('package_name', $data['package_name'])
                    ->where('is_active', true)
                    ->first();

                $limitExceeded = false;
                $currentStatus = null;

                if ($appLimit && $appLimit->limit_minutes) {
                    $limitMinutes = $appLimit->limit_minutes;
                    $usedMinutes = $data['used_minutes'];

                    // 1. Cek apakah batas terlampaui
                    if ($usedMinutes >= $limitMinutes) {
                        $limitExceeded = true;
                        $currentStatus = 'EXCEEDED';
                    }
                    // 2. Cek apakah hampir mencapai batas (Warning di 80%)
                    else if ($usedMinutes >= $limitMinutes * 0.8) {
                        $currentStatus = 'WARNING';
                    }

                    // 3. Tambahkan ke warning list jika ada status
                    if ($currentStatus) {
                        // Cek apakah warning sudah dikirim hari ini (Opsional: menghindari spam notif)
                        // Karena kita tidak menyimpan log notifikasi, kita kirimkan saja.

                        $limitWarnings[] = [
                            'package_name' => $data['package_name'],
                            'app_name' => $data['app_name'],
                            'used_minutes' => $usedMinutes,
                            'limit_minutes' => $limitMinutes,
                            'status' => $currentStatus,
                            // Exceeded by hanya relevan jika status EXCEEDED
                            'exceeded_by' => $limitExceeded ? ($usedMinutes - $limitMinutes) : 0,
                        ];
                    }
                }

                // Update or create AppUsageLog
                $usageLog = AppUsageLog::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'package_name' => $data['package_name'],
                        'usage_date' => $data['usage_date'],
                    ],
                    [
                        'app_name' => $data['app_name'],
                        'used_minutes' => $data['used_minutes'],
                        'app_limit_id' => $appLimit?->id,
                        'limit_exceeded' => $limitExceeded,
                        'last_synced_at' => now(),
                    ]
                );

                $syncedCount++;
            }

            DB::commit();

            Log::info("✅ Synced successfully for user {$userId}: {$syncedCount} records");

            return response()->json([
                'success' => true,
                'message' => 'Usage data synced successfully',
                'synced_count' => $syncedCount,
                'user_id' => $userId,
                'limit_warnings' => $limitWarnings, // Kirim warning ke Flutter
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('❌ Sync failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to sync usage data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get usage statistics
     */
    public function getStatistics(Request $request)
    {
        $days = $request->input('days', 7);
        $userId = $this->getUserId($request);

        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'User ID required'
            ], 401);
        }

        // ... (Logika mengambil statistik lainnya)
        $startDate = Carbon::now()->subDays($days)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $totalMinutes = AppUsageLog::forUser($userId)
            ->forDateRange($startDate, $endDate)
            ->sum('used_minutes');

        $totalApps = AppUsageLog::forUser($userId)
            ->forDateRange($startDate, $endDate)
            ->distinct('package_name')
            ->count('package_name');

        $dailyAverage = round($totalMinutes / max($days, 1), 0);

        $todayMostUsed = AppUsageLog::forUser($userId)
            ->forDate(Carbon::today())
            ->orderBy('used_minutes', 'desc')
            ->first();

        $limitsExceeded = AppUsageLog::forUser($userId)
            ->forDateRange($startDate, $endDate)
            ->where('limit_exceeded', true)
            ->count();

        return response()->json([
            'success' => true,
            'user_id' => $userId,
            'period_days' => $days,
            'statistics' => [
                'total_screen_time_minutes' => $totalMinutes,
                'total_screen_time_hours' => round($totalMinutes / 60, 2),
                'total_apps_tracked' => $totalApps,
                'daily_average_minutes' => $dailyAverage,
                'daily_average_hours' => round($dailyAverage / 60, 2),
                'limits_exceeded_count' => $limitsExceeded,
                'most_used_today' => $todayMostUsed ? [
                    'app_name' => $todayMostUsed->app_name,
                    'used_minutes' => $todayMostUsed->used_minutes,
                ] : null,
            ],
        ]);
    }

    /**
     * Get favorite apps
     */
    public function getFavoriteApps(Request $request)
    {
        $limit = $request->input('limit', 5);
        $days = $request->input('days', 30);
        $userId = $this->getUserId($request);

        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'User ID required'
            ], 401);
        }

        // ... (Logika mengambil favorite apps)
        $startDate = Carbon::now()->subDays($days)->startOfDay();

        $favoriteApps = AppUsageLog::select(
                'package_name',
                'app_name',
                DB::raw('SUM(used_minutes) as total_minutes'),
                DB::raw('AVG(used_minutes) as avg_daily_minutes'),
                DB::raw('COUNT(*) as days_used')
            )
            ->forUser($userId)
            ->where('usage_date', '>=', $startDate)
            ->groupBy('package_name', 'app_name')
            ->orderBy('total_minutes', 'desc')
            ->limit($limit)
            ->get()
            ->map(function ($app) {
                return [
                    'package_name' => $app->package_name,
                    'app_name' => $app->app_name,
                    'total_minutes' => (int) $app->total_minutes, // Pastikan tipe data konsisten
                    'total_hours' => round($app->total_minutes / 60, 2),
                    'avg_daily_minutes' => round($app->avg_daily_minutes, 0),
                    'days_used' => $app->days_used,
                ];
            });

        Log::info("Favorite apps for user {$userId}: " . $favoriteApps->count());

        return response()->json([
            'success' => true,
            'user_id' => $userId,
            'period_days' => $days,
            'favorite_apps' => $favoriteApps,
        ]);
    }

    /**
     * Get daily usage
     */
    public function getDailyUsage(Request $request, $date)
    {
        try {
            $userId = $this->getUserId($request);

            if (!$userId) {
                return response()->json([
                    'success' => false,
                    'message' => 'User ID required'
                ], 401);
            }

            // ... (Logika mengambil daily usage)
            $targetDate = Carbon::parse($date);

            $dailyUsage = AppUsageLog::forUser($userId)
                ->forDate($targetDate)
                ->orderBy('used_minutes', 'desc')
                ->get()
                ->map(function ($log) {
                    return [
                        'app_name' => $log->app_name,
                        'package_name' => $log->package_name,
                        'used_minutes' => (int) $log->used_minutes,
                        'used_hours' => round($log->used_minutes / 60, 2),
                        'limit_exceeded' => $log->limit_exceeded,
                        'has_limit' => $log->app_limit_id !== null,
                    ];
                });

            $totalMinutes = $dailyUsage->sum('used_minutes');

            return response()->json([
                'success' => true,
                'user_id' => $userId,
                'date' => $targetDate->format('Y-m-d'),
                'total_minutes' => $totalMinutes,
                'total_hours' => round($totalMinutes / 60, 2),
                'apps' => $dailyUsage,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid date format',
            ], 400);
        }
    }

    /**
     * Get weekly chart (Senin - Minggu)
     */
    public function getWeeklyChart(Request $request)
    {
        $userId = $this->getUserId($request);

        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'User ID required'
            ], 401);
        }

        // 📅 Hitung Senin minggu ini
        $today = Carbon::now();
        $startOfWeek = $today->copy()->startOfWeek(Carbon::MONDAY); // Senin minggu ini
        $endOfWeek = $today->copy()->endOfWeek(Carbon::SUNDAY);

        // Ambil data dari database
        $dailyTotals = AppUsageLog::select(
                'usage_date',
                DB::raw('SUM(used_minutes) as total_minutes')
            )
            ->forUser($userId)
            ->forDateRange($startOfWeek, $endOfWeek)
            ->groupBy('usage_date')
            ->orderBy('usage_date')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->usage_date->format('Y-m-d') => $item->total_minutes];
            });

        // Generate chart data dari Senin sampai Minggu
        $chartData = [];
        $currentDate = $startOfWeek->copy();

        while ($currentDate <= $endOfWeek) {
            $dateStr = $currentDate->format('Y-m-d');
            $totalMinutes = $dailyTotals[$dateStr] ?? 0;

            $chartData[] = [
                'date' => $dateStr,
                'day_name' => $currentDate->format('D'),
                'total_minutes' => (int) $totalMinutes, // Pastikan int
                'total_hours' => round($totalMinutes / 60, 2),
                'is_today' => $currentDate->isToday(),
            ];
            $currentDate->addDay();
        }

        // Top apps minggu ini
        $topApps = AppUsageLog::select(
                'app_name',
                'package_name',
                DB::raw('SUM(used_minutes) as total_minutes')
            )
            ->forUser($userId)
            ->forDateRange($startOfWeek, $endOfWeek)
            ->groupBy('app_name', 'package_name')
            ->orderBy('total_minutes', 'desc')
            ->limit(3)
            ->get()
            ->map(function ($app) {
                return [
                    'app_name' => $app->app_name,
                    'package_name' => $app->package_name,
                    'total_minutes' => (int) $app->total_minutes, // Pastikan int
                    'total_hours' => round($app->total_minutes / 60, 2),
                ];
            });

        return response()->json([
            'success' => true,
            'user_id' => $userId,
            'week_start' => $startOfWeek->format('Y-m-d'),
            'week_end' => $endOfWeek->format('Y-m-d'),
            'chart_data' => $chartData,
            'top_apps' => $topApps,
            'total_week_minutes' => array_sum(array_column($chartData, 'total_minutes')),
            'total_week_hours' => round(array_sum(array_column($chartData, 'total_minutes')) / 60, 2),
        ]);
    }
}