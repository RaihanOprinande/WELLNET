<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppLimit;
use App\Models\AppUsageLog;
use App\Models\Violation;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppLimitController extends Controller
{
    /**
     * Simpan/Update app limits dari user
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'app_limits' => 'required|array|min:1',
            'app_limits.*.package_name' => 'required|string',
            'app_limits.*.app_name' => 'required|string',
            'app_limits.*.category' => 'required|in:Social,Entertainment,Education,Others',
            'app_limits.*.limit_minutes' => 'required|integer|min:1|max:1440',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $userId = $request->user_id;
            $savedLimits = [];

            foreach ($request->app_limits as $appData) {
                $limit = AppLimit::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'package_name' => $appData['package_name']
                    ],
                    [
                        'app_name' => $appData['app_name'],
                        'category' => $appData['category'],
                        'limit_minutes' => $appData['limit_minutes'],
                        'is_active' => true
                    ]
                );

                $savedLimits[] = $limit;
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'App limits berhasil disimpan',
                'data' => $savedLimits
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get all app limits untuk user
     */
    public function getUserLimits($userId)
    {
        $limits = AppLimit::where('user_id', $userId)
            ->where('is_active', true)
            ->get();

        return response()->json([
            'status' => true,
            'data' => $limits
        ], 200);
    }

    /**
     * Sync usage dari aplikasi Flutter
     */
    public function syncUsage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'usage_date' => 'required|date',
            'app_usage' => 'required|array',
            'app_usage.*.package_name' => 'required|string',
            'app_usage.*.app_name' => 'required|string',
            'app_usage.*.used_minutes' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $userId = $request->user_id;
            $usageDate = Carbon::parse($request->usage_date)->toDateString();
            $violations = [];

            foreach ($request->app_usage as $usage) {
                // Cari app limit
                $appLimit = AppLimit::where('user_id', $userId)
                    ->where('package_name', $usage['package_name'])
                    ->where('is_active', true)
                    ->first();

                // Update atau create usage log
                $usageLog = AppUsageLog::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'package_name' => $usage['package_name'],
                        'usage_date' => $usageDate
                    ],
                    [
                        'app_limit_id' => $appLimit?->id,
                        'app_name' => $usage['app_name'],
                        'used_minutes' => $usage['used_minutes'],
                        'limit_exceeded' => $appLimit && $usage['used_minutes'] > $appLimit->limit_minutes,
                        'last_synced_at' => now()
                    ]
                );

                // Cek pelanggaran
                if ($appLimit && $usage['used_minutes'] > $appLimit->limit_minutes) {
                    $exceededBy = $usage['used_minutes'] - $appLimit->limit_minutes;

                    // Hitung severity
                    $severity = 1;
                    if ($exceededBy > 60) $severity = 3; // >1 jam = berat
                    elseif ($exceededBy > 30) $severity = 2; // >30 menit = sedang

                    $violations[] = [
                        'package_name' => $usage['package_name'],
                        'app_name' => $usage['app_name'],
                        'used_minutes' => $usage['used_minutes'],
                        'limit_minutes' => $appLimit->limit_minutes,
                        'exceeded_by' => $exceededBy,
                        'severity' => $severity
                    ];
                }
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Usage berhasil disinkronkan',
                'violations' => $violations
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Sync error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check apakah aplikasi terblokir
     */
    public function checkAppBlock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'package_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $userId = $request->user_id;
        $packageName = $request->package_name;
        $today = Carbon::today()->toDateString();

        // Cari app limit
        $appLimit = AppLimit::where('user_id', $userId)
            ->where('package_name', $packageName)
            ->where('is_active', true)
            ->first();

        if (!$appLimit) {
            return response()->json([
                'status' => true,
                'is_blocked' => false,
                'message' => 'No limit set for this app'
            ], 200);
        }

        // Cek usage hari ini
        $usageLog = AppUsageLog::where('user_id', $userId)
            ->where('package_name', $packageName)
            ->where('usage_date', $today)
            ->first();

        $usedMinutes = $usageLog ? $usageLog->used_minutes : 0;
        $isBlocked = $usedMinutes >= $appLimit->limit_minutes;

        return response()->json([
            'status' => true,
            'is_blocked' => $isBlocked,
            'app_name' => $appLimit->app_name,
            'used_minutes' => $usedMinutes,
            'limit_minutes' => $appLimit->limit_minutes,
            'remaining_minutes' => max(0, $appLimit->limit_minutes - $usedMinutes),
            'message' => $isBlocked ? 'App limit reached for today' : 'App accessible'
        ], 200);
    }

    /**
     * Log pelanggaran dan kurangi poin
     */
    public function logViolation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'type' => 'required|in:downtime,app_limit,sleep_schedule,digital_freetime,nlp_toxicity',
            'details' => 'nullable|string',
            'severity' => 'required|integer|min:1|max:3',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();

            // Hitung pelanggaran hari ini
            $todayStart = Carbon::today();
            $violationCount = Violation::where('user_id', $request->user_id)
                ->where('type', $request->type)
                ->where('occurred_at', '>=', $todayStart)
                ->count();

            // Kurangi poin jika pelanggaran > 3 kali
            $pointsDeducted = 0;
            if ($violationCount >= 3) {
                $pointsDeducted = 5;

                $userSetting = UserSetting::where('user_id', $request->user_id)->first();
                if ($userSetting) {
                    $userSetting->skor = max(0, $userSetting->skor - $pointsDeducted);
                    $userSetting->save();
                }
            }

            // Log violation
            $violation = Violation::create([
                'user_id' => $request->user_id,
                'type' => $request->type,
                'details' => $request->details,
                'severity' => $request->severity,
                'points_deducted' => $pointsDeducted,
                'occurred_at' => now()
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Violation logged',
                'data' => [
                    'violation_count_today' => $violationCount + 1,
                    'points_deducted' => $pointsDeducted,
                    'should_show_warning' => ($violationCount + 1) >= 3
                ]
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get violation summary
     */
    public function getViolationSummary($userId)
    {
        $today = Carbon::today();
        $thisWeek = Carbon::now()->startOfWeek();

        $todayViolations = Violation::where('user_id', $userId)
            ->where('occurred_at', '>=', $today)
            ->count();

        $weekViolations = Violation::where('user_id', $userId)
            ->where('occurred_at', '>=', $thisWeek)
            ->get()
            ->groupBy('type')
            ->map(fn($group) => $group->count());

        $totalPointsLost = Violation::where('user_id', $userId)
            ->sum('points_deducted');

        return response()->json([
            'status' => true,
            'data' => [
                'today_violations' => $todayViolations,
                'week_violations_by_type' => $weekViolations,
                'total_points_lost' => $totalPointsLost,
                'warning_level' => $todayViolations >= 3 ? 'high' : ($todayViolations >= 2 ? 'medium' : 'low')
            ]
        ], 200);
    }
}