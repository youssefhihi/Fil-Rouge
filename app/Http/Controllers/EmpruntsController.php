<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $reservations = Reservation::where('is_taken',false)->whereDate('startDate', $currentDate)->orWhereDate('startDate', $tomorrowDate)->get();
        $today = $currentDate->format('Y-m-d');
        return view("admin.TodaysReservation" ,compact("reservations","today"));
    }
}
