<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $dates = ['returnDate','startDate'];
    protected $fillable = [
        'client_id',
        'book_id',
        'startDate',
        'returnDate',
        'is_returned',
        'is_taken',
        'send_email',
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



    public function daysUntilReturn()
    {
        $today = Carbon::today();
        $returnDate = $this->returnDate;

        return $today->diffInDays($returnDate);
    }

    public function duration()
    {
        $startDate = Carbon::parse($this->startDate);
        $returnDate = Carbon::parse($this->returnDate);
        return $startDate->diffInDays($returnDate);
    }
}
