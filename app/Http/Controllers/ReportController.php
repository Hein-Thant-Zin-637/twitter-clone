<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function adminReportPostTable()
    {
        $data = Report::all();
        

        return view('admin.reportPostTable', [
            'reports' => $data,
            
        ]);    
   
    }


    public function detail($id)
    {
   
        $data = Post::find($id);

        return view('admin.postDetail',[
            'post' => $data
        ]);
    }
}
