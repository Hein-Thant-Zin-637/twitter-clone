<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\Chat;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\MessageReport;

class MessageReportController extends Controller
{
    public function adminReportMessageTable()
    {
        $data = MessageReport::all();
        

        return view('admin.reportMessage', [
            'messagereports' => $data,
            
        ]);    
   
    }

    public function banForm($id)
    {
    
        $data = User::find($id);

        return view('admin.banSpanMessageUser', [
            'user' => $data
        ]);
    }

    public function ban(Request $request)
    {

        $date = strtotime("+" . $request->ban . "Hours");
        $timer = date("Y-m-d H:i:s", $date);
     

        Ban::create([
            'user_id' => $request->user_id,
            'timer' => $timer,

        ]);

        return redirect('admin/report-message-table')->with('message', 'User is Banned!');
    }

    public function deleteChat($id, Request $request)
    {
        $chat = Chat::find($id);
        
       
        Notification::create([
            'user_id' => $request->user_id,
            'message' => $request->message,
            'link' => "#"
        ]);

        $chat = Chat::find($id)->delete();
        // $reportmessage = MessageReport::find($request->id)->delete();

        return redirect('admin/report-message-table')->with('message', 'Chat is Deleted!');
    }
}
