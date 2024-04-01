<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genres =  Genre::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $authors =  Author::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $topBooks =  Book::limit(4)->get(); 
        $books = Book::orderByDesc('created_at')->get();    
        return view('client.books',compact('genres','topBooks','books','authors'));
    
    }

    public function sortGenre(Genre $genre){ 
        $genres =  Genre::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $authors =  Author::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $topBooks =  Book::limit(4)->get(); 
        $books =  Book::where("genre_id",$genre->id)->get();
        return view('client.booksSort',compact('genres','topBooks','books','authors'));

    }

    public function sortAuthor(Author $author){ 
        $genres =  Genre::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $authors =  Author::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $topBooks =  Book::limit(4)->get();      
        $books =  Book::where("author_id",$author->id)->get();   
        return view('client.booksSort',compact('genres','topBooks','books','authors'));
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
    public function show(Book $book)
    {   $genres =  Genre::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $authors =  Author::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $topBooks =  Book::limit(4)->get(); 
        $posts = Post::where('description', 'like', '%' . $book->title . '%')->get();
        return view("client.bookPage",compact('genres','topBooks','book','authors','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
