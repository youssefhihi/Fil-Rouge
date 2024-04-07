<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'client_id',
    ];

    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
    
    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }
}
