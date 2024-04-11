<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'book_id',
        'starsCount',
       
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
