<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $categories = Category::all();

        return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function postsByCategory(Category $category): View
    {
        return view('posts.index', [
            'posts' => Post::where(
                'category_id', $category->id
            )->latest()->paginate(10),
            'categories' => Category::all(),
        ]);
    }

    public function postsByTag(Tag $tag): View
    {
        return view('posts.index', [
            'posts' => Post::whereRelation(
                'tags', 'tags.id', $tag->id
            )->latest()->paginate(10),
            'categories' => Category::all(),
        ]);
    }

    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
