<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\TemaQuiz;

class SoalQuiz extends Model
{
    use HasFactory;

    protected $table = 'soal_quiz';

    protected $fillable = [
        'temaquiz_id',
        'pertanyaan',
        'jawaban_benar',
    ];

    public function tema()
    {
        return $this->belongsTo(TemaQuiz::class, 'temaquiz_id');
    }

        public function opsi()
    {
        return $this->hasMany(OpsiSoal::class, 'soalquiz_id');
    }

}
