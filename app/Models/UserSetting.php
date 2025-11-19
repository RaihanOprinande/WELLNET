<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;


class UserSetting extends Model
{
    use HasFactory;

    protected $table = 'user_setting';

    protected $fillable = [
        'user_id',
        'child_id',
        'jenis_kelamin',
        'umur',
        'skor',
        'lencana',
        'downtime',
        'sleep_schedule_start',
        'sleep_schedule_end',
        'digital_freetime_start',
        'digital_freetime_end'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // app/Models/UserSetting.php
    public function child()
    {
        return $this->belongsTo(UserChildren::class, 'child_id');
    }

    public function logPelanggaran()
    {
        return $this->hasMany(LogPelanggaran::class, 'setting_id');
    }

    public function logQuiz()
    {
        return $this->hasMany(LogQuiz::class, 'setting_id');
    }

    protected function badgeName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->determineBadgeName($this->skor),
        );
    }

        protected function determineBadgeName(float $skor): string
    {
        // Pastikan skor adalah nilai positif
        $skor = max(0, $skor);

        if ($skor >= 55) {
            return 'Digital Sage';
        } elseif ($skor >= 48) {
            return 'Skywalker';
        } elseif ($skor >= 41) {
            return 'Mountaineer';
        } elseif ($skor >= 33) {
            return 'Trailblazer';
        } elseif ($skor >= 25) {
            return 'Explorer';
        } elseif ($skor >= 18) {
            return 'Sprout';
        } elseif ($skor >= 12) {
            return 'Seedling';
        } else {
            return 'Seedling'; // Atau nama lencana default jika skor di bawah 12
        }
    }


}
