<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Matiere;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('dashboard.index', [
            'posts' => Post::all(),
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'users' => User::all(),
            'matieres' => Matiere::all(),
        ]);
    }
}
