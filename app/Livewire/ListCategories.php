<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ListCategories extends Component
{

    public $categories;

    protected $listeners = [
        'loadCategories'
    ];

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = Category::all();
    }

    public function editCategory($category_id)
    {
        $this->dispatch('edit', $category_id);
        $this->loadCategories();
    }

    public function deleteCategory($category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
        session()->flash('success', 'Category successfully delete');
        $this->loadCategories();
    }

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        /* return view('livewire.list-categories'); */

        return view('livewire.list-categories', [
            'categorie' => Category::paginate(5),
        ]);
    }
}
