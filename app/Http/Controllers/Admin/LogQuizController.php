<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogQuiz;
use App\Models\TemaQuiz;
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

    // kolom jawaban benar dari tabel soal_quiz
    $correctColumn = 'jawaban_benar';

    // ===============================
    // GRAFIK PROGRES QUIZ PER MINGGU
    // ===============================
    $completion = LogQuiz::selectRaw('temaquiz_id, COUNT(DISTINCT setting_id) as total_user')
        ->groupBy('temaquiz_id')
        ->pluck('total_user', 'temaquiz_id');

    $accuracy = LogQuiz::selectRaw("
        log_quiz.temaquiz_id,
        (SUM(CASE WHEN is_correct = 1 THEN 1 ELSE 0 END) / COUNT(*)) * 100 as accuracy
    ")
    ->groupBy('temaquiz_id')
    ->pluck('accuracy', 'temaquiz_id');

    $quizLabels = TemaQuiz::orderBy('week')->pluck('week', 'id');


    // 3. labels (week)
    $labels = TemaQuiz::orderBy('week')->pluck('week', 'id');

    return view('admin.log_quiz.index', compact(
        'log_quiz',
        'labels',
    'completion',      // data baru
        'accuracy',        // data baru
        'quizLabels'       // label minggu
    ));
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
