<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowList extends Component
{
    public $users;
    
    protected $listeners = ['userFollow' => 'refreshList'];

    public function mount()
    {
        $this->refreshList();
    }

    public function refreshList()
    {
        $this->users = User::all();
    }
    public function render()
    {
        return view('livewire.follow-list');
    }
}
