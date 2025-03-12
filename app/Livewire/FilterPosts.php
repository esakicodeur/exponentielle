<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class FilterPosts extends Component
{

    public $category_id;
    public $query;

    public function render()
    {
        $categories = Category::get();

        return view('livewire.filter-posts', [
            'categories' => $categories
        ]);
    }

    public function filter()
    {
        $this->emitTo('show-posts', 'reloadPosts', $this->category_id, $this->query);
    }
}
