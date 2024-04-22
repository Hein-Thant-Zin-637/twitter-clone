<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Notification;
use Illuminate\Http\Request;

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
        $data = Post::find($id);
        $user_id = $data->user_id;
       
        Notification::create([
            'user_id' => $user_id,
            'message' => $request->message,
            'link' => "#"
        ]);

        $post = Post::find($id)->delete();

        return redirect('admin/post-table')->with('message', 'Post is Deleted!');
    }
}
