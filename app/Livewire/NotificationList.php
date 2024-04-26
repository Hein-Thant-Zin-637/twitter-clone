<?php

namespace App\Livewire;

use App\Models\Notification;
use Livewire\Component;

class NotificationList extends Component
{
    public $notification;
    
    public function haveRead($id){
        $noti = Notification::find($id);
        $noti->is_read = true;
        $noti->save();
    }

    public function mount()
    {
        $this->refreshData();
    }

    
    public function refreshData()
    {
        $this->notification = auth()->user()->notification;
    }
    public function render()
    {
        return view('livewire.notification-list');
    }
}
