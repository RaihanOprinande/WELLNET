<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogQuiz;
use Illuminate\Http\Request;

class LogQuizController extends Controller
{
    public function index()
    {
        $log_quiz = LogQuiz::with([
            'setting.user',
            'setting.child',
            'tema',
            'soal',
            'opsi'
        ])->paginate(10);

    $jawaban_benar_collection = $log_quiz->filter(function ($item) {
        // Cek apakah relasi 'opsi' ada dan apakah is_correct bernilai true (1)
        // Gunakan operator === true untuk kejelasan, asumsikan is_correct dicasting ke boolean
        return $item->opsi && $item->opsi->is_correct === true;
    });

        return view('admin.log_quiz.index', compact('log_quiz','jawaban_benar_collection'));
    }

    public function show($id)
    {
        $log_quiz = LogQuiz::with([
            'setting.user',
            'setting.child',
            'tema',
            'soal'
        ])->findOrFail($id);

        return view('admin.log_quiz.show', compact('log_quiz'));
    }
}
