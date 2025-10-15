<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpsiSoal extends Model
{
    use HasFactory;
    protected $table = 'opsi_soal';
    protected $fillable = ['soalquiz_id', 'opsi', 'is_correct'];

    public function soal()
    {
        return $this->belongsTo(SoalQuiz::class, 'soalquiz_id');
    }
}
