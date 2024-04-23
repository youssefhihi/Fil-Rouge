<?php
namespace App\Repositories\Post;
use App\Models\Post;
use App\trait\ImageUpload;


class PostRepository implements PostRepositoryInterface {

 use ImageUpload;
   
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












