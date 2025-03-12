<?php

namespace App\Livewire\FrontOffice;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $category_id = '';

    public function render()
    {
        $posts = Post::searchPost($this->search);

        if ($this->category_id) {
            $posts = $posts->where('category_id', $this->category_id);
        }

        return view('livewire.front-office.posts-table', [
            'categories' => Category::all(),
            'posts' => $posts->paginate(10)
        ]);
    }
}
