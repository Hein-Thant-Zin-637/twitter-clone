<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $search = "";

 

<<<<<<< HEAD
    public $tagList = true;

    protected $queryString=['search'];
=======
>>>>>>> fd24ff5313590e9202fc22d32d38c0f9cdc9b161

    
    public function render()
    {
<<<<<<< HEAD
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
=======
        
       
        $posts =  Post::where('description', 'like', '%' . $this->search . '%')->get();
        return view('livewire.search',[
            'posts'=> $posts
            
>>>>>>> fd24ff5313590e9202fc22d32d38c0f9cdc9b161
        ]);
    }

}
