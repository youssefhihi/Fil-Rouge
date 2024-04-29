<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Rating;
use App\trait\ImageUpload;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use ImageUpload;

    public function __construct(protected PostService $PostService) 
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genres =  Genre::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $authors =  Author::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $books = Book::withCount('reservationsNotReturned')
                                ->orderByDesc('reservations_not_returned_count')->limit(4)
                                ->get();
        $type = $request->input('type');
        $search = '%'.$request->input('search') .'%';
        $query = Post::query();
        if($type){
            if ($type !== 'all' && $type !== null) {
                $query->where('type', $type);
            }

        }else if($search){
            $query = Post::where('description', 'like', $search)
            ->orWhereHas('client', function($query) use ($search) {
                $query->whereAny([
                    'city',
                    'bio',
                    'gender',
                ], 'like', $search);
            })
            ->orWhereHas('client.user', function($query) use ($search) {
                $query->whereAny(['username','name'], 'like', $search);
            });
            
            
        }
        $posts = $query->orderByDesc('id')->get();
        
        return view('client.home',compact('posts','genres','books','authors'));   
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
            $this->PostService->insert($request);
            return redirect()->back();
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
        return view('client.editPost',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        try {
            $this->PostService->update($request,$post);
            return redirect('/profile')->with("success", "post updated successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Error: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with("success", "post deleted successfully.");

    }
}
