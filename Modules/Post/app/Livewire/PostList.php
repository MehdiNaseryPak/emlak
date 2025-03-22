<?php

namespace Modules\Post\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Category\Models\Category;
use Modules\Post\Models\Post;

class PostList extends Component
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
        $posts = Post::query()->where('title' , 'like' , '%'.$this->search.'%')->with(['category','user'])->paginate(10);
        return view('post::livewire.post-list',compact('posts'));
    }
    public function deleteConfirm($id)
    {
        $post = Post::query()->find($id);
        $this->dispatch('deletePost',postId: $post->id);
    }
    public function delete($id)
    {
        $post = Post::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }

    public function changeStatus($id)
    {
        $post = Post::query()->find($id);
        if($post->status == 1)
        {
            $post->update(['status' => 0]);
        }
        else
        {
            $post->update(['status' => 1]);
        }
    }
}
