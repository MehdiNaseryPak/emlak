<?php

namespace Modules\Category\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Category\Models\Category;

class CategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    public function render()
    {
        $categories = Category::query()->where('name' , 'like' , '%'.$this->search.'%')->with('parent')->paginate(10);
        return view('category::livewire.category-list',compact('categories'));
    }
    public function deleteConfirm($id)
    {
        $category = Category::query()->find($id);
        $this->dispatch('deleteCategory',categoryId: $category->id);
    }
    public function delete($id)
    {
        $category = Category::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }

    public function changeStatus($id)
    {
        $category = Category::query()->find($id);
        if($category->status == 1)
        {
            $category->update(['status' => 0]);
        }
        else
        {
            $category->update(['status' => 1]);
        }
    }
}
