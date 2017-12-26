<?php

namespace Forum\Http\Controllers;

use Illuminate\Http\Request;
use Forum\Thread;
use Forum\Post;

class PostController extends Controller
{
    public function store(Request $request, Thread $thread)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $post = new Post;
        $post->body = $request->body;
        $post->user_id = 2;
        $thread->posts()->save($post);

        return redirect('threads/'.$thread->slug);
    }
}
