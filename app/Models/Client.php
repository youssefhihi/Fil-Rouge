<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
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
        'joined_at',
        'is_banned',
        'can_post',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the user's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'client_id');
    }
}
