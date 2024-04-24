<?php
namespace App\Repositories\Comment;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentRepository implements CommentRepositoryInterface {
 
    public function insert($request){
       $data =$request->validated();
       $data['client_id'] = Auth::user()->client->id;
      return Comment::create($data);
    }

    public function get($post)
    {

       return Comment::where('post_id',$post)->with('client.user')->with('client.image')->orderByDesc('created_at')->get();
   
        
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
