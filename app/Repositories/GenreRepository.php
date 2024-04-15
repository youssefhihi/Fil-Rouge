<?php
namespace App\Repositories;
use App\Models\Genre;

class GenreRepository implements GenreRepositoryInterface {
 
    public function insert($request){
        Genre::create($request->validated());
    }


    public function update($request,$genre)
    {
        $genre->update($request->validated());
    }
    
    public function destroy($genre)
    {
        $genre->delete();
    }
}
