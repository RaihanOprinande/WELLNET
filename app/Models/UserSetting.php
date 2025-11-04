<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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


}
