<?php

namespace App\Livewire\BackOffice;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $perPage = 10;

    public function render()
    {
        return view('livewire.back-office.posts-table', [
            'posts' => Post::searchPost($this->search)
                    ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage)
        ]);
    }
}
