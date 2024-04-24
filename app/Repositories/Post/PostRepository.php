<?php
namespace App\Repositories\Post;
use App\Models\Book;
use App\Models\Post;
use App\Models\Genre;
use App\Models\Author;
use App\trait\ImageUpload;
use Illuminate\Support\Facades\Auth;


class PostRepository implements PostRepositoryInterface {

 use ImageUpload;



    
    public function store($request)
    {
        if(Auth::user()->client->can_post){
            return redirect()->back()->with("error", "Sorry, you're unable to post at the moment. Please reach out to the administrator for assistance.");
        }else{
            
            $data = $request->validated();
            $data['client_id'] = Auth::user()->client->id;
            $post = Post::create($data); 
            if($request->hasFile('image') || $request->file('image')){         
                $this->storeImg($post, $request->file('image'));
            }   
        }
    }

    public function update($request,$post)
    {
        
            $data = $request->validated();
            if (!$request->hasFile('image') || !$request->file('image')) {
                if($post->image){
                $data["image"] = $post->image->path;
                $post->update($data);
                }else{
                    $post->update($data);
                }
            } else {
                if($post->image){
                    $this->updateImg($post, $request->file('image'));
                }else{
                    $this->storeImg($post, $request->file('image'));
                }
                $post->update($data);
            }    
           
    }
    
    public function destroy($post)
    {
       return $post->delete();
    }
}












