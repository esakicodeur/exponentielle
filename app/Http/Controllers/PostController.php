<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
