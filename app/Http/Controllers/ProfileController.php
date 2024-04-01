<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
