<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $posts = Post::query();

        if ($search = $request->search) {
            $posts->where(fn ( Builder $query) => $query
                ->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('content', 'LIKE', '%' . $search . '%')
            );
        }

        return view('posts.index', [
            'posts' => $posts->latest()->paginate(10),
            'categories' => Category::all(),
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
        $postImages = PostImage::where('post_id', $post->id)->get();

        return view('posts.show', [
            'postImages' => $postImages,
            'post' => $post,
        ]);
    }

    public function comment(Post $post, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'comment' => ['required', 'string', 'between:2,255'],
        ]);

        Comment::create([
            'content' => $validated['comment'],
            'post_id' => $post->id,
            'user_id' => Auth::id(),
        ]);

        return back()->withStatus('Commentaire publie !');
    }
}
