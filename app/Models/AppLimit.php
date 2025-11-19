<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppLimit extends Model
{
    use HasFactory;

    protected $table = 'app_limits';

    protected $fillable = [
        'setting_id',
        'package_name',
        'app_name',
        'category',
        'limit_minutes',
        'is_active',
    ];

    public function usageLogs()
    {
        return $this->hasMany(AppUsageLog::class, 'app_limit_id');
    }
}
