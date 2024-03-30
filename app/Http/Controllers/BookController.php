<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use App\trait\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    use ImageUpload;

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
        $genres = Genre::get();
        $authors = Author::get();
        return view("admin.createBook",compact("genres","authors"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        try {

            $Book = Book::create($request->validated());
            $this->storeImg($Book, $request->file('image'));       
            return redirect("/dashboard/books")->with("message", "Book added with success.");
        } catch (\Exception $e) {

            return redirect()->back()->with("error", "Error: " . $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $genres = Genre::get();
        $authors = Author::get();
        return view('admin.editBook',compact('book','genres','authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        try {

            $book->update($request->validated());
            $this->updateImg($book, $request->file('image'));
            return redirect()->back()->with("success", "book updated with success.");

        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Error.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();
            return redirect()->back()->with("success", "Book deleted with success");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Error!.");
        }
    }
}
