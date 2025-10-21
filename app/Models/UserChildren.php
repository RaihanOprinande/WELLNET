<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserChildren extends Model
{
    use HasFactory;

    protected $table = 'user_children';

    protected $fillable = [
        'parent_id',
        'username',
        'email',
    ];

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id')->where('role', 'parent');
    }

}
