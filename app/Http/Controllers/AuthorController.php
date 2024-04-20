<?php

namespace App\Http\Controllers;
use App\Models\Author;
use App\trait\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::withCount('books')->orderByDesc('books_count')->get();
        return view('admin.authors',compact('authors'));
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
       public function store(AuthorRequest $request)
    {
        try{
            $data = $request->validated();
            $author = Author::create($data); 
            if($request->hasFile('image') || $request->file('image')){         
                $this->storeImg($author, $request->file('image'));
            }         
            return redirect()->back()->with("success", "author added with success.");
        } catch (\Exception $e) {

            return redirect()->back()->with("error", "Error: " . $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('admin.editAuthor',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author)
{
    try {
        $data = $request->validated();
        if (!$request->file('image')) {
            if($author->image){
            $data["image"] = $author->image->path;
            $author->update($data);
            }else{
                $author->update($data);
            }
        } else {
            if($author->image){
                $this->updateImg($author, $request->file('image'));
            }else{
                $this->storeImg($author, $request->file('image'));
            }
            $author->update($data);
        }    
        return redirect('dashboard/authors')->with("message", "Author updated successfully.");
    } catch (\Exception $e) {
        return redirect()->back()->with("error", "Error: " . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        try {
            $author->delete();
            return redirect()->back()->with("success", "author deleted with success");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Error: " . $e->getMessage());
        }
    }
}
