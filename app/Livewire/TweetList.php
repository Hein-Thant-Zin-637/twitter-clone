<?php

namespace App\Livewire;

use Livewire\Component;

class TweetList extends Component
{
    public $pins,$tweets,$user;
    
    protected $listeners = ['refreshPins' => 'refreshData'];

    
    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->pins = $this->user->pins;
        $this->tweets = $this->user->posts;
    }
    
    public function render()
    {
        return view('livewire.tweet-list');
    }
}
