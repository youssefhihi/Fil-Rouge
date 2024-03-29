<?php

namespace App\Livewire;

use App\Models\Genre;
use Livewire\Component;

class SearchGenre extends Component
{
    public $search = '';
    public function render()
    {
        $genres = []; 
        
        if ($this->search) {
            $genres = Genre::where('name', 'like', '%' . $this->search . '%')->get();
        } else {
            $genres = Genre::get();
        }
    
        return view('livewire.search-genre', compact('genres'));
    }
    
}
