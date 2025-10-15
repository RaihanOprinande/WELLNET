<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Psychoeducation extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'psychoeducation';

    protected $fillable = [
        'title',
        'image',
        'link_yt',
        'content',
    ];
}

