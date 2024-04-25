<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $search = "";

 


    public function render()
    {
        
       
        $posts =  Post::where('description', 'like', '%' . $this->search . '%')->get();
        return view('livewire.search',[
            'posts'=> $posts
            
        ]);
    }

}
