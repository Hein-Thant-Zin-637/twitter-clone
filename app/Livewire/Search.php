<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $search;

    public $tagList = true;
    
    public function render()
    {
        $list = Post::all();
        
        if(strlen($this->search) > 0){
            $this->tagList = false;
            $posts = Post::where('description', 'like', '%' . $this->search . '%')->get();
        }else{
            $this->tagList = true;
            $posts = $list;
        }
        return view('livewire.search',[
            'posts'=> $posts,
        ]);
    }

}
