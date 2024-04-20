<?php
namespace App\Repositories\Comment;

interface CommentRepositoryInterface {
    
    public function get($get);
    public function insert($request);
    public function update($request,$genre);
    public function destroy($genre);


 }

 ?>