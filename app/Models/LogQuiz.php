<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TemaQuiz;
use App\Models\SoalQuiz;

class LogQuiz extends Model
{
    use HasFactory;

    protected $table = 'log_quiz';

    protected $fillable = [
        'user_id',
        'temaquiz_id',
        'soalquiz_id',
        'jawaban_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tema()
    {
        return $this->belongsTo(TemaQuiz::class, 'temaquiz_id');
    }

    public function soal()
    {
        return $this->belongsTo(SoalQuiz::class, 'soalquiz_id');
    }
}
