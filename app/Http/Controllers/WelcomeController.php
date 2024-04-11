<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function data(){
        $books = Book::get();
        return view("landing",compact('books'));
    }
}
