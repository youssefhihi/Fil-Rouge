<?php
namespace App\Repositories\Comment;
use App\Models\Comment;
use App\Models\Post;

class CommentRepository implements CommentRepositoryInterface {
 
    public function insert($request){
       
      return Comment::create($request->validated());
    }

    public function get($post)
    {

       return Comment::where('post_id',$post)->with('client.user')->with('client.image')->get();
   
        
    }
    public function update($request,$Comment)
    {
       return $Comment->update($request->validated());
    }
    
    public function destroy($Comment)
    {
       return $Comment->delete();
    }
}
