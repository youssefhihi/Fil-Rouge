<?php
namespace App\Repositories\Comment;

interface CommentRepositoryInterface {
    
    public function get($post);
    public function insert($request);
    public function update($request,$comment);
    public function destroy($comment);


 }

 ?>