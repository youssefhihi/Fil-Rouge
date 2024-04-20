<?php
namespace App\Repositories\Genre;

interface GenreRepositoryInterface {
    
    public function all();
    public function insert($request);
    public function update($request,$genre);
    public function destroy($genre);


 }

 ?>