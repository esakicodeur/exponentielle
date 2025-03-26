<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class PostImageController extends Controller
{
    public function index(int $postId): View
    {
        $post = Post::findOrFail($postId);

        $postImages = PostImage::where('post_id', $postId)->get();

        return view('post-images.index', compact('post', 'postImages'));
    }

    public function store(Request $request, int $postId)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:png,jpg,jpeg,webp'
        ]);

        $post = Post::findOrFail($postId);

        $imageData = [];

        if ($files = $request->file('images')) {

            foreach ($files as $key => $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $key . '-' . time() . '.' . $extension;

                $path = "uploads/posts/";

                $file->move($path, $filename);

                $imageData[] = [
                    'post_id' => $post->id,
                    'image' => $path.$filename,
                ];
            }
        }

        PostImage::insert($imageData);

        return redirect()->route('admin.posts.index')->withStatus('Images uploadées !');
    }

    public function destroy(int $postImageId)
    {
        $postImage = PostImage::findOrFail($postImageId);

        if (File::exists($postImage->image)) {
            File::delete($postImage->image);
        }

        $postImage->delete();

        return redirect()->route('admin.posts.index')->withStatus('Image supprimée !');
    }
}
