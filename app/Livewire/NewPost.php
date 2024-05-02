<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Post_Media;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewPost extends Component
{
    use WithFileUploads;

    public $description, $images = [] ;

    protected function rules()
    {
        return [
            'description' => 'required|string|min:6',
        ];
    }

    public function storePost()
    {
        
        $validatedData = $this->validate();
        $validatedData['user_id'] = auth()->user()->id;
        $post = Post::create($validatedData);

        preg_match_all('/#(\w+)/', $this->description , $matches);
        $hashtags = $matches[0];
        $selectedTags = [];
        foreach ($hashtags as $hashtag) {
            $tag = Tag::where('name',$hashtag)->first();
            if($tag !== null){
                array_push($selectedTags, $tag->id);
            }else{
                $tag = Tag::create([ 'name' => $hashtag]);
                array_push($selectedTags, $tag->id);
            }
        }
        $post->tags()->attach($selectedTags);

        foreach ($this->images as $image) {
            $path = $image->store( 'images', 'public');
            Post_Media::create([
                'post_id' => $post->id,
                'media' => $path, 
            ]);
            $this->images = [];
        }

        $this->resetInput();
        $this->dispatch('close-modal');
        $this->dispatch('refreshPosts');
        $this->dispatch('refreshTags');
    }

    public function resetInput()
    {
        $this->description = '';
        $this->images = '';
    }

    public function removeImage($index)
    {
        array_splice($this->images, $index, 1);
    }

    public function render()
    {
        return view('livewire.new-post');
    }
}
