<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPelanggaran extends Model
{
    use HasFactory;

    protected $table = 'log_pelanggaran';
    protected $fillable = ['setting_id', 'pelanggaran'];

    public function setting()
    {
        return $this->belongsTo(UserSetting::class, 'setting_id');
    }
}
