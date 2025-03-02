<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'posts' => Post::all(),
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'users' => User::all(),
        ]);
    }
}
