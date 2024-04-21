<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
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
        
        $usersCount = User::where('role','client')->count();
        $booksCount = Book::count();
        $monthlyReservation = Reservation::where('is_returned',true)->where('is_taken',true)->whereDate('created_at', '>=', now()->subMonth())->count();
        $weekReservation = Reservation::where('is_returned',true)->where('is_taken',true)->whereDate('created_at', '>=', now()->subweek())->count();
        $newRegistrations = User::where('role', 'client')->whereDate('created_at', '>=', now()->subMonth())->count();
        $dailyPosts = Post::whereDate('created_at','>=',now()->subDays())->count();
        return view('admin.dashboard',compact('dailyPosts','booksCount','usersCount','weekReservation','monthlyReservation','newRegistrations'));
    }
    
    public function users()
    {
        $users = User::where('role','client')->get();
        return view('admin.users',compact('users'));
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
    public function ShowClientProfile(User $username)
    {
        $user = $username;
        return view('admin.clientProfile',compact('user'));
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
