<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class SearchBook extends Component
{
    public $search = '';
    public function render()
    {
        $books = []; 
        
        if ($this->search) {
            $books = Book::where('title', 'like', '%' . $this->search . '%')->get();
        } else {
            $books = Book::get();
        }
    
        return view('livewire.search-book', compact('books'));
    }
}
