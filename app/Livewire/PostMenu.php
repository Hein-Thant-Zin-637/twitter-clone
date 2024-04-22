<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostMenu extends Component
{
    public $post;

    
    public function deletePost(int $post_id)
    {
        Post::find($post_id)->delete();
        $this->refreshPosts();
    }

    public function render()
    {
        return view('livewire.post-menu');
    }
}
