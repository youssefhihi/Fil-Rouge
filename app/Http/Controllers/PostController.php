<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Genre;
use App\trait\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genres = Genre::withCount('books')->orderByDesc('books_count')->limit(4);
        dd($genres);
        $type = $request->input('type');
        if($type !== 'all'){
            $posts = Post::where('type',$type)->orderByDesc('created_at')->get();       
        }else{
            $posts = Post::orderByDesc('created_at')->get();
        }
        $posts = Post::orderByDesc('created_at')->get();
        return view('client.home',compact('posts','genres'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        try{
            $data = $request->validated();
            $data['client_id'] = Auth::user()->client->id;
            $post = Post::create($data); 
            if($request->hasFile('image') || $request->file('image')){         
                $this->storeImg($post, $request->file('image'));
            }         
            return redirect()->back()->with("success", "author added with success.");
        } catch (\Exception $e) {

            return redirect()->back()->with("error", "Error: " . $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.editPost',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        try {
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
            return redirect('dashboard/feed')->with("message", "post updated successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Error: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
