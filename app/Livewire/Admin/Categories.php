<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $search;

    public function render()
    {
        $categories = Category::query()->
        where('title', 'like', '%'. $this->search . '%')->
        paginate(10);
        return view('livewire.admin.categories', compact('categories'));
    }
}
