<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUsageLog extends Model
{
    use HasFactory;

    protected $table = 'app_usage_logs';

    protected $fillable = [
        'setting_id',
        'app_limit_id',
        'package_name',
        'app_name',
        'usage_date',
        'used_minutes',
        'limit_exceeded',
    ];

    public function limit()
    {
        return $this->belongsTo(AppLimit::class, 'app_limit_id');
    }
}
