<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserSetting;
use App\Models\TemaQuiz;
use App\Models\SoalQuiz;

class LogQuiz extends Model
{
    use HasFactory;

    protected $table = 'log_quiz';

    protected $fillable = [
        'setting_id',
        'temaquiz_id',
        'soalquiz_id',
        'jawaban_user',
    ];

    // Relasi ke user_setting (bukan langsung ke user lagi)
    public function setting()
    {
        return $this->belongsTo(UserSetting::class, 'setting_id');
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
