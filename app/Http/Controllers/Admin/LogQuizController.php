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
            'soal'
        ])->paginate(10);

        return view('admin.log_quiz.index', compact('log_quiz'));
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
