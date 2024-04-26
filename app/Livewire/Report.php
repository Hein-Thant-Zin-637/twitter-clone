<?php

namespace App\Livewire;

use App\Models\Report as ModelsReport;
use Livewire\Component;

class Report extends Component
{
    public $post;
    public $message;

    protected $rules = [
        'message' => 'required|min:3',
    ];

    public function submitReport()
    {
        $this->validate();

        ModelsReport::create([
            'post_id' => $this->post->id,
            'message' => $this->message,
        ]);

        $this->message = '';
        $this->dispatch('close-modal', id:$this->post->id);
    }
    public function render()
    {
        return view('livewire.report');
    }
}
