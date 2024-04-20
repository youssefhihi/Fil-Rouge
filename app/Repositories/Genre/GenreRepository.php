<?php
namespace App\Repositories\Genre;
use App\Models\Genre;

class GenreRepository implements GenreRepositoryInterface {
 
    public function insert($request){
       return Genre::create($request->validated());
    }

    public function all()
    {
        return Genre::get();

    }
    public function update($request,$genre)
    {
       return $genre->update($request->validated());
    }
    
    public function destroy($genre)
    {
       return $genre->delete();
    }
}
