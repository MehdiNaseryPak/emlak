<?php

namespace Modules\Ads\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Ads\Models\Ads;

class AdsList extends Component
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
        $ads = Ads::query()->where('title' , 'like' , '%'.$this->search.'%')->with(['category','user'])->paginate(10);
        return view('ads::livewire.ads-list',compact('ads'));
    }
    public function deleteConfirm($id)
    {
        $ad = Ads::query()->find($id);
        $this->dispatch('deleteAd',AdId: $ad->id);
    }
    public function delete($id)
    {
        $ad = Ads::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }

    public function changeStatus($id)
    {
        $ad = Ads::query()->find($id);
        if($ad->status == 1)
        {
            $ad->update(['status' => 0]);
        }
        else
        {
            $ad->update(['status' => 1]);
        }
    }
    public function changeShowInSlider($id)
    {
        $ad = Ads::query()->find($id);
        if($ad->show_in_slider == 1)
        {
            $ad->update(['show_in_slider' => 0]);
        }
        else
        {
            $ad->update(['show_in_slider' => 1]);
        }
    }
}
