<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'client_id',
        'post_id',
        'content'
    ];


   public function client()
   {
    return $this->belongsTo(Client::class,'client_id');
   }
}
