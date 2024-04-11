<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\User;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\profileSocialeMedia;
use App\Http\Requests\UpdateProfileInf;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $id = Auth::user()->client->id;
        $genres =  Genre::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $authors =  Author::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $books =  Book::limit(4)->get();
        $type = $request->input('type');
        $query = Post::where("client_id",$id)->orderByDesc('created_at');
        if ($type !== 'all' && $type !== null) {
            $query->where('type', $type);
        }
        $posts = $query->get();
        return view('client.profile',compact('posts','genres','books','authors'));
    
    }

    public function show()
    {
        return view('client.editProfile');
    }

    public function update(ProfileRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

       return redirect('/profile')->with('success' , 'profile updated with seccess');
    }

    public function password(Request $request){
        $validated = $request->validateWithBag(
            'updatePassword',[
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
    
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        return redirect('/profile')->with('success' , 'profile updated with seccess');

    }
    public function updateInf(UpdateProfileInf $request)
    {
        $user = Auth::user()->client;
        $user->update($request->validated());
        return redirect()->back()->with('success' , 'your Profile information updated with success');
    }
    public function socialeMedia(profileSocialeMedia $request)
    {
        $user = Auth::user()->client;
        $user->update($request->validated());
        return redirect()->back()->with('success' , 'your Profile information updated with success');
    }
}
