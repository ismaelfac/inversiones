<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class CreatePostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $post = new Post($request->all());
        auth()->user()->posts()->save($post);
        return $post->title;
    }
}
