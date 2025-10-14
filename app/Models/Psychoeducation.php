<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psychoeducation extends Model
{
    use HasFactory;

    protected $table = 'psychoeducation';

    protected $fillable = [
        'title',
        'image',
        'link_yt',
        'content',
    ];
}

