<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $users = User::where('role','client')->get();
        return view('admin.users',compact('users'));
    }

    public function dashboard()
    {
        $usersCount = User::where('role','client')->count();
        $booksCount = Book::count();
        $reservationCount = Reservation::where('')->count();
        return view('admin.dashboard',compact('usersCount'));
    }

    public function blockUser(){
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function canPost(User $user)
    {
        if($user->client->can_post){
            $user->client->update([
                'can_post' => False,
            ]);
        return redirect()->back()->with('message','user banned with success');
        }else{
            $user->client->update([
                'can_post' => True,
            ]);
        return redirect()->back()->with('message','user can\'t post from now success');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function block(User $user)
    {
        if($user->client->is_banned){
            $user->client->update([
                'is_banned' => False,
            ]);
        return redirect()->back()->with('message','user banned with success');
        }else{
            $user->client->update([
                'is_banned' => True,
            ]);
        return redirect()->back()->with('message','user banned with success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
