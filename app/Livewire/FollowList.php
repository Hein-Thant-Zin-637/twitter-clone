<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowList extends Component
{
    public $users;
    
    protected $listeners = ['userFollow' => 'refreshPosts'];

    public function mount()
    {
        $this->refreshPosts();
    }

    public function refreshPosts()
    {
        $this->users = User::latest()->get();
    }
    public function render()
    {
        return view('livewire.follow-list');
    }
}
