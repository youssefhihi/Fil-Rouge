<?php
namespace App\Repositories\Comment;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface {
 
    public function insert($request){
       return Comment::create($request->validated());
    }

    public function get($id)
    {

        return Comment::where('post_id',$id)->get();

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
