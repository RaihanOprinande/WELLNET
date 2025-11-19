<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LogQuiz;
use App\Models\OpsiSoal;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LogQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LogQuiz::with('setting','tema','soal')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditampilkan',
            'data' => $data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Array Jawaban
        $validator = Validator::make($request->all(), [
            'answers' => 'required|array|min:1',
            // Validasi setiap item di dalam array 'answers'
            'answers.*.setting_id' => 'required|exists:user_setting,id',
            'answers.*.temaquiz_id' => 'required|exists:tema_quiz,id',
            'answers.*.soalquiz_id' => 'required|exists:soal_quiz,id',
            'answers.*.opsi_soal_id' => 'required|exists:opsi_soal,id',
        ], [
            'required' => 'Field :attribute wajib diisi.',
            'exists' => 'Field :attribute tidak valid atau tidak ditemukan.',
            'array' => 'Payload harus berupa array jawaban di bawah kunci "answers".'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal pada salah satu jawaban.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $answers = $request->answers;
        // Asumsi semua setting_id di quiz ini sama, ambil yang pertama
        $settingId = $answers[0]['setting_id'];
        $totalCorrect = 0;
        $totalScoreChange = 0.0;

        DB::beginTransaction();

        try {
            $userSetting = UserSetting::find($settingId);
            if (!$userSetting) {
                DB::rollBack();
                return response()->json(['status' => 'error', 'message' => 'User Setting tidak ditemukan.'], 404);
            }

            // 2. Loop melalui setiap jawaban
            foreach ($answers as $answer) {
                $opsiSoal = OpsiSoal::find($answer['opsi_soal_id']);

                if (!$opsiSoal) {
                    // Walaupun sudah divalidasi, ini untuk keamanan
                    Log::warning("OpsiSoal ID {$answer['opsi_soal_id']} tidak ditemukan saat loop.");
                    continue;
                }

                // Periksa Kebenaran Jawaban
                $isCorrect = (bool) $opsiSoal->is_correct;
                $scoreChange = $isCorrect ? 0.5 : -0.5;

                // Logging Jawaban
                LogQuiz::create([
                    'setting_id' => $settingId,
                    'soalquiz_id' => $answer['soalquiz_id'],
                    'temaquiz_id' => $answer['temaquiz_id'],
                    'opsi_soal_id' => $answer['opsi_soal_id'],
                    'is_correct' => $isCorrect,
                ]);

                // Akumulasi perubahan skor dan hitungan benar
                if ($isCorrect) {
                    $totalCorrect++;
                }
                $userSetting->skor += $scoreChange;
                $totalScoreChange += $scoreChange;
            }

            // 3. Update Skor Final dan Commit
            // dd($answers);
            $userSetting->save();
            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Jawaban kuis berhasil disimpan dan skor telah diperbarui.',
                'data' => [
                    'total_soal' => count($answers),
                    'jawaban_benar' => $totalCorrect,
                    'skor_akumulasi' => number_format($totalScoreChange,1),
                    'skor_terbaru' => number_format($userSetting->skor, 1),
                ]
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Gagal menyimpan batch jawaban kuis: " . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan server saat memproses data batch. Coba lagi.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = LogQuiz::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'data' => null
            ],404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $data
        ],200);
    }

    public function showuser(string $id){

    $data = LogQuiz::with('user')->where("setting_id",$id)->get();


    // Gunakan isEmpty() untuk mengecek apakah Collection kosong
    if ($data->isEmpty()) {
        return response()->json([
            'status' => false,
            'message' => 'Data tidak ditemukan untuk setting ID ini.',
            'data' => null
        ], 404);
    }

    // Jika data ditemukan, lanjutkan
    return response()->json([
        'status' => true,
        'message' => 'Data berhasil ditampilkan',
        'data' => $data
    ], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
