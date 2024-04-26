<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Notification;
use App\Models\Post_Media;
use App\Models\Post_Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function adminPostTable()
    {
        $data = Post::all();
        

        return view('admin.postTable', [
            'posts' => $data,
            
        ]);

        
   
    }

    public function delete($id, Request $request)
    {
        $post = Post::find($id);
        $user_id = $post->user_id;
       
        Notification::create([
            'user_id' => $user_id,
            'message' => $request->message,
            'link' => "#"
        ]);

        $images = Post_Media::where('post_id',$post->id)->get();
        if($images){
            foreach($images as $image){
                Storage::delete('public/'.$image->media);
                $image->delete();
            }
        }
        $tags = Post_Tag::where('post_id', $post->id)->get();
        if($tags){
            foreach($tags as $tag){
                $tag->delete();
            }
        }

        $post = Post::find($id)->delete();

        return redirect('admin/post-table')->with('message', 'Post is Deleted!');
    }
}
