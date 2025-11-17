<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SoalQuizResource;
use App\Models\SoalQuiz;
use Illuminate\Http\Request;

class SoalQuizController extends Controller
{
    /**
     * Display all soal quiz.
     */
    public function index()
    {
        $data = SoalQuiz::with('tema')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditampilkan',
            'data' => SoalQuizResource::collection($data)
        ], 200);
    }

    /**
     * Display list soal based on temaquiz_id.
     */
    public function show($temaId)
    {
        $data = SoalQuiz::with('tema')
            ->where('temaquiz_id', $temaId)
            ->get();

        // ✔ Perbaikan: cek apakah data kosong
        if ($data->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada soal untuk tema ini',
                'data' => []
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditampilkan',
            'data' => SoalQuizResource::collection($data)
        ], 200);
    }
}
