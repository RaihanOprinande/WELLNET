<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
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

    protected function summary(): Attribute
    {
        return Attribute::get(
            // $attributes['content'] adalah nilai asli dari kolom 'content'
            fn (mixed $value, array $attributes) => Str::limit($attributes['title'], 60, '...'),
        );
    }
}

