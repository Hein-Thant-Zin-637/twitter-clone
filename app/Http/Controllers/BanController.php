<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Ban;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\Timer\Timer;

class BanController extends Controller
{
    public function adminUserTable()
    {
        $data = User::all();
        $data1 = Ban::all();



        return view('admin.userTable', [
            'users' => $data,
            'bans' => $data1
        ]);
    }

    public function banForm($id)
    {
        $data = User::find($id);

        return view('admin.banUser', [
            'user' => $data
        ]);
    }

    public function ban(Request $request)
    {

        $date = strtotime("+" . $request->ban . "Hours");
        $timer = date("Y-m-d H:i:s", $date);
        //  $today = date("Y-m-d h:i:s");
        // $date1 = new DateTime($timer);
        // $date2 = new DateTime($today);


        // $interval = $date1->diff($date2);
       
        // $days = $interval->format('%a');
        // $hours = $interval->format('%h');

        Ban::create([
            'user_id' => $request->user_id,
            'timer' => $timer,

        ]);

        return redirect('admin/user-table')->with('message', 'User is Banned!');
    }

    public function delete($id)
    {

        $data = Ban::find($id);


        $post = Ban::find($id)->delete();

        return back()->with('message', 'User is Unban!');
    }
}
