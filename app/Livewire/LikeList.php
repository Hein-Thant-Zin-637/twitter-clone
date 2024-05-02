<?php

namespace App\Livewire;

use Livewire\Component;

class LikeList extends Component
{
    public $likes,$user;
    
    protected $listeners = ['refreshLikes' => 'refreshData'];
    
    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->likes = $this->user->likes;
    }
    public function render()
    {
        return view('livewire.like-list');
    }
}
