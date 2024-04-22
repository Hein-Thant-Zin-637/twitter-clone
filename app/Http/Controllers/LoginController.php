<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Ban;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index($step)
    {
        return view('auth.login', ['step' => $step]);
    }

    public function store(Request $request, $step)
    {
        $error = [];
        $type = null;
        if ($step == 'data') {
            if ($request->type !== null) {
                if (User::where('email', $request->type)->exists()) {
                    $type = 'email';
                } elseif (User::where('phone', $request->type)->exists()) {
                    $type = 'phone';
                } elseif (User::where('user_name', $request->type)->exists()) {
                    $type = 'user_name';
                } else {
                    $error += ['type' => "This account doesn't exists"];
                }
            }
            if ($request->type === null) {
                $error += ['type' => "Please provide something"];
            }
            $data = [
                'type'  => $type,
                $type   => $request->type,
            ];
            if ($error != null) {
                return back()->withInput($request->input())->withErrors($error);
            } else {
                return redirect()->route('singin', ['step' => 'password'])->with($data);
            }
        } elseif ($step == 'password') {
            if ($request->password === null) {
                $error += ['password' => "Please provide your password"];
            }

            if (strlen($request->password) < 8) {
                $error += ['password' => "Passwoed need more than 8 characters"];
            }

            $type = $request->type;
            $data = $request->$type;
            $user = User::where($type, $data)->first();




            if (password_verify($user->password, $request->password)) {
                $error += ['password' => "Passwoed is not incorrect"];
            }

            $hasban = DB::table('bans')->where('user_id', $user->id)->get();
            if (!$hasban->isEmpty()) {

                $today = date("Y-m-d H:i:s");
                $timer = $hasban[0]->timer ?? false;

                $date1 = new DateTime($timer);
                $date2 = new DateTime($today);

               
                $interval = $date1->diff($date2);

                $days = $interval->format('%a');
                $hours = $interval->format('%h');

                if ($interval->invert == 1) {
                    $hasban->delete();
                }else {
                    



                    $_SESSION['ban'] = "your account has been ban for " . $days . " Days and " . $hours . " Hours Left";
                    return redirect('/');
                }
            }



            if ($error != null) {
                return back()->withInput($request->input())->withErrors($error);
            } else {
                Auth::login($user);
                return redirect('/home');
            }
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
