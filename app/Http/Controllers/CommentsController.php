<?php

 

namespace App\Http\Controllers;

 

use Illuminate\Http\Request;

use App\Http\Requests\CommentRequest as CommentRequest;

use App\Models\Comments;

 

class CommentsController extends Controller

{

    public function store(CommentRequest $request)

    {

        $validated = $request->validated();

 

        Comments::create($validated);

 

        $request->session()->flash('status', 'Comment Telah Berhasil ditambahkan !');

 

        return redirect()->route('posts.show', ['post'=> $request->blog_post_id]);

    }

}