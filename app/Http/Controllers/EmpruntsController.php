<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\ReturnReminderEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmpruntsController extends Controller
{
    public function emprunts(){
        $reservations = Reservation::where('is_returned', false)->where('is_taken', true)->get();

        return view('admin.emprunts',compact('reservations'));
    }


    public function TodaysReservation()
    {

        $currentDate = Carbon::today();
        $tomorrowDate = Carbon::tomorrow();      
        $reservations = Reservation::where('is_taken', false)->whereIn('startDate', [$currentDate, $tomorrowDate])->get();        
        $today = $currentDate->format('Y-m-d');
        return view("admin.TodaysReservation" ,compact("reservations","today"));
    }

    public function returnBook(){
        $TodayDate = Carbon::today();
        $reservations = Reservation::where('is_returned', false)->where('is_taken', true)->whereDate('returnDate',$TodayDate)->get();
        return view('admin.ReturnBooks',compact('reservations'));
        

    }

    public function update(Reservation $reservation)
    {
        try{
            $reservation->update(['is_returned' => true]);
            return redirect()->back()->with('success','success');
        } catch (\Exception $e){
             dd($e->getMessage());
            return redirect()->back()->with("error", "Error: " . $e->getMessage());
            
        }
    }

    public function returnMail(Reservation $reservation)
    {
        try{
            // Mail::to($reservation->client->user->email)->send(new ReturnReminderEmail($reservation->id));
            $count = $reservation->send_email + 1;
            $reservation->update([
                'send_email' => $count,
            ]);
           return redirect()->back()->with('success','Email sent successfully');
        } catch (\Exception $e){
             dd($e->getMessage());
            return redirect()->back()->with("error", "Error: " . $e->getMessage());
            
        }
    }


    public function TakeBookMail(Reservation $reservation)
    {
        try{
            // Mail::to($reservation->client->user->email)->send(new TakeBookEmail($reservation->id));
            $count = $reservation->send_email + 1;
            $reservation->update([
                'send_email' => $count,
            ]);
           return redirect()->back()->with('success','Email sent successfully');
        } catch (\Exception $e){
             dd($e->getMessage());
            return redirect()->back()->with("error", "Error: " . $e->getMessage());
            
        }
    }
}
