<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Services\CommentService;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(protected CommentService $CommentService) {
      }
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
    public function store(CommentRequest $request)
    {

        $comment =  $this->CommentService->create($request);
        $comments =  $this->CommentService->get($comment->post_id);
        $authId = Auth::user()->client->id;
        return response()->json(['comments'=> $comments, 'authId' => $authId]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        $comments =  $this->CommentService->get($post);
        $authId = Auth::user()->client->id;

        return response()->json(['comments'=> $comments, 'authId' => $authId]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->CommentService->delete($comment);
        $comments =  $this->CommentService->get($comment->post_id);
        $authId = Auth::user()->client->id;
        return response()->json(['comments'=> $comments, 'authId' => $authId]);
    }
}
