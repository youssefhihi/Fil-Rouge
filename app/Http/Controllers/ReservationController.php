<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\ReservationEmail;
use App\Mail\RefuseResevationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendReturnReminderEmail;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $reservations = Reservation::where('is_returned', false)->where('is_taken', false)->get();
    
        return view('admin.reservations',compact('reservations'));
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
        $book = Book::find($data['book_id']);
        $client = Auth::user()->client;
        $data['client_id'] = $client->id;
        $reservedBooksCount = $client->reservations()->where('is_returned', false)->count();
        $existingReservation = $client->reservations()->where('book_id', $data['book_id'])->where('is_returned', false)->exists();
        if ($existingReservation) {
            return redirect('/home/books')->with('error', 'You have already reserved this book and it has not been returned yet.');
        }   
        if ($reservedBooksCount >= 3) {
            return redirect('/home/books')->with('error', 'You have already reserved the maximum number of books allowed.');
        }
        if ($book->quantity > 0) {
            $new_quantity = $book->quantity - 1;
            $book->update(['quantity' => $new_quantity]);
            $reservation = Reservation::create($data);
            //send Email     
            Mail::to(Auth::user()->email)->send(new ReservationEmail($reservation->id));
            return redirect('/home/books')->with('success', 'The reservation has been sent to the admin for confirmation.');
        } else {
            return redirect('/home/books')->with('success', 'Quantity not enough.');
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
    public function update(Reservation $reservation)
    {

    try{
        $reservation->update(['is_taken' => true, 'send_email' => 0]);
        return redirect()->back()->with('success','success');
    } catch (\Exception $e){
         dd($e->getMessage());
        return redirect()->back()->with("error", "Error: " . $e->getMessage());
        
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Reservation $reservation)
    {
        $request->validate([
            'sendEmail' => 'nullable',
            'message' => 'required_if:sendEmail,true'
        ]);
       
        if($request->message){
         Mail::to($reservation->client->user->email)->send(new RefuseResevationMail($reservation->id,$request->message));
        }
        $reservation->delete();
    }
}
