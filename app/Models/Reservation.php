<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'book_id',
        'startDate',
        'returnDate',
        'is_returned',
        'message',
    ];


    /**
     * Get the client that owns the reservation.
     */
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    /**
     * Get the book that the reservation belongs to.
     */
    public function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }
}
