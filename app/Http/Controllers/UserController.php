<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
 
    public function update(Request $request)
    {
       $user =  User::find(auth()->user()->id);

        
        $validated = $request->validate(
            [
                'name' => 'required',
                'cover' => 'image',
                'profile' => 'image',
            ]
        );

      if(is_null($request->cover) && is_null($request->profile))
      {
     
            $user->update([
                'name' => $request->name,
                'bio' => $request->bio,
                'website' => $request->website,
                'location' => $request->location,
                'phone' => $request->phone,
            ]);
      }elseif(!is_null($request->cover)&&  is_null($request->profile)){
        $path =  $request->file('cover')->store('images','public');

        if($oldcover = auth()->user()->cover_photo)
        {
         Storage::disk('public')->delete($oldcover);
        }

        $user->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'website' => $request->website,
            'location' => $request->location,
            'phone' => $request->phone,
            'cover_photo' => $path,
        ]);

      }elseif(!is_null($request->profile) && is_null($request->cover))
      {
        $path =  $request->file('profile')->store('images','public');

        if($oldprofile = auth()->user()->profile)
        {
         Storage::disk('public')->delete($oldprofile);
        }

       $user->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'website' => $request->website,
            'location' => $request->location,
            'phone' => $request->phone,
            'profile' => $path,
        ]);

      }else{
        $path1 =  $request->file('cover')->store('images','public');
        $path2 =  $request->file('profile')->store('images','public');

        if($oldprofile = auth()->user()->profile)
        {
         Storage::disk('public')->delete($oldprofile);
        }

        if($oldcover = auth()->user()->cover_photo)
        {
         Storage::disk('public')->delete($oldcover);
        }

       $user->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'website' => $request->website,
            'location' => $request->location,
            'phone' => $request->phone,
            'cover_photo' => $path1,
            'profile' => $path2
        ]);

      }

     return back()->with('message' ,'Your avatar is changed');
      
    }

    public function detail($id)
    {
   
        $data = User::find($id);

        return view('admin.userDetail',[
            'user' => $data
        ]);
    }
}
