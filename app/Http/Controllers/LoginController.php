<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
                }elseif(User::where('phone', $request->type)->exists()) {
                    $type = 'phone';
                }elseif(User::where('user_name', $request->type)->exists()) {
                    $type = 'user_name';
                }else{
                    $error += ['type' => "This account doesn't exists" ];
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

            if(password_verify( $user->password ,$request->password)){
                $error += ['password' => "Passwoed is not incorrect"];
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
