<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemaQuiz extends Model
{
    use HasFactory;

    protected $table = 'tema_quiz';

    protected $fillable = [
        'title',
        'topik',
        'materi_relevan',
        'image',
        'description',
        'week',
    ];
}
