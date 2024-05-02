<?php

namespace App\Livewire;

use Livewire\Component;

class RepostList extends Component
{
    public $reposts,$user;
    
    protected $listeners = ['refreshReposts' => 'refreshData'];

    
    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->reposts = $this->user->reposts;
    }
    
    public function render()
    {
        return view('livewire.repost-list');
    }
}
