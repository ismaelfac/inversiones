<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;
use App\Post;

class ShowPostController extends Controller
{
    public function __invoke(Post $post, $slug)
    {
        if ($post->slug != $slug) {
            return redirect($post->url, 301);
        }

        $post->load('latestComments.userVote', 'latestComments.post');

        return view('posts.show', compact('post'));
    }
}
