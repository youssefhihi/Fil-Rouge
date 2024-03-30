<?php

namespace App\Livewire;

use App\Models\Author;

use Livewire\Component;

class SearchAuthor extends Component
{
    public $search = '';
    public function render()
    {
        $authors = []; 
        
        if ($this->search) {
            $authors = Author::where('name', 'like', '%' . $this->search . '%')->get();
        } else {
            $authors = Author::get();
        }
    
        return view('livewire.search-author', compact('authors'));
    }
}
