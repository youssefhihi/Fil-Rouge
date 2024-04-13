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


    public function search(Request $request){
        if($request->ajax())
        {
            $query = $request->get('query');
            $output =[];
            if($query != ''){
                $data = Book::where('title', 'like', '%'.$query.'%')
                            ->orWhereHas('genre', function($genreQuery) use ($query) {
                                $genreQuery->where('name', 'like', '%'.$query.'%');
                            })
                            ->orWhereHas('author', function($authorQuery) use ($query) {
                                $authorQuery->where('name', 'like', '%'.$query.'%');
                            })
                            ->get();
    
                $total_data = $data->count();
                if($total_data > 0){
                foreach($data as $book){
                array_push($output,'<a href="' .route('book.details',$book).'" class="mt-4 flex space-x-4 px-3">
                <img src="' . asset('storage/' . $book->image->path ).'" alt="" class="h-24 w-16" >  
                <div class="flex flex-col gap-2">
                  <div class=" flex flex-col ">
                    <p class="text-white capitalize text-xl hover:underline">' . $book->title. '</p>
                  </div>
                  <p class="test-gray-400 text-center text-sm ">' . $book->genre->name . '</p>
                </div>
                </a>
                <div class="border border-black dark:border-gray-500 my-2"></div>
                ');
                }
                }else{
                    $output = ' 
                    <div class="flex justify-center px-3">
                    <p class="text-center text-3xl text-gray-500 mb-6 mt-10 font-serif">No data found for <b>"'. $query .'"</b></p>
                    </div>';
                }
            } else {
                $output = 'No query provided';
            }
            $data = [
                'table_data' => $output,
                'total_data' => $total_data,
            ];
            echo json_encode($data);
            
        }
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
