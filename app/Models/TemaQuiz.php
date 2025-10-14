<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class TemaQuiz extends Model
{
    use HasFactory,HasApiTokens;

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
