<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    protected $table = 'emailverifications';

    protected $fillable = ['child_id', 'token', 'expires_at'];

    public function child()
    {
        return $this->belongsTo(UserChildren::class);
    }
}
