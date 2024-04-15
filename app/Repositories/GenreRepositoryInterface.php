<?php
namespace App\Repositories;

interface GenreRepositoryInterface {
    
  
    public function insert($request);
    public function update($request,$genre);
    public function destroy($genre);


 }

 ?>