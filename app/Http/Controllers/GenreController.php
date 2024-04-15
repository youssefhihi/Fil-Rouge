<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;
use App\Repositories\GenreRepositoryInterface;


class GenreController extends Controller
{
    protected $genre_repo = null;

    public function __construct(GenreRepositoryInterface $genre_repo)
    {
        $this->genre_repo = $genre_repo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::get();
        return view('admin.genres',compact('genres'));
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
    public function store(GenreRequest $request)
    {
        $this->genre_repo->insert($request);
       return  redirect()->back()->with('message','Genre added with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('admin.editGenre',compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request, Genre $genre)
    {
        $this->genre_repo->update($request,$genre);
        return redirect('/dashboard/genres')->with('message','Genre updated with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $this->genre_repo->destroy($genre);
       return redirect()->back()->with('message','Genre updated with success');
    }
    
    public function restore(Genre $genre)
    {
        $genre->restore();
        redirect()->back()->with('message','Genre restored with success');
    }
}
