<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $search;

    protected $queryString=['search'];

    public function render()
    {

        return view('livewire.search',[
            'posts'=> Post::where('description', 'like', '%' . $this->search . '%')->get()
        ]);
    }

}
