<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends User
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sex',
        'phone',
        'birthday',
        'city',
        'country',
        'bio',
        'is_banned',
        'can_post',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
