<?php
namespace App\Repositories\Post;

interface PostRepositoryInterface {
    
   
    public function update($request,$post);
    public function destroy($post);


 }

 ?>