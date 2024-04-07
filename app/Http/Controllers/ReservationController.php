<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationEmail;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
{
    $data = $request->validated();
    $data['client_id'] = Auth::user()->client->id;
    $book = Book::find($data['book_id']);

    if ($book->quantity > 0) {
        $new_quantity = $book->quantity - 1;

        // Update the book's quantity
        $book->update(['quantity' => $new_quantity]);

        // Create the reservation
        $reservation = Reservation::create($data);

        // Send reservation email
        Mail::to(Auth::user()->email)->send(new ReservationEmail($reservation->id));

        return redirect('/books')->with('success', 'The reservation has been sent to the admin for confirmation.');
    } else {
        return redirect('/books')->with('success', 'Quantity not enough.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
