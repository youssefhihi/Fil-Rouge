<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Requests\RatingRequest;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(RatingRequest $request)
{
    $data = $request->validated();
    $data['client_id'] = Auth::user()->client->id;
    $rating = Rating::create($data);
    $countLikes = Rating::where('post_id',$rating->post_id)->count();  
    return response()->json(['countLikes' => $countLikes , 'like_id' => $rating->id]);
}

/**
 * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(RatingRequest $request, Rating $rating)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        $rating->delete();
        $countLikes = Rating::where('post_id',$rating->post_id)->count(); 
        $post = $rating->post->id; 
        return response()->json(['countLikes' => $countLikes,'post'=> $post]);
    }
}
