<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        $dateOfBirth = $googleUser->user['birthdate'] ?? null;
        if (!$user) {
            $username = $this->generateUsername($googleUser->name);
                if (User::where('user_name', $username)->exists()) {
                    $username = $this->generateUsername($googleUser->name);
                }
            $user = User::create([
                'name' => $googleUser->name,
                'user_name' => $username,
                'email' => $googleUser->email,
                'password' => bcrypt('generatedPassword'),
                'dob' => $dateOfBirth,
                'profile' => $googleUser->avatar,

            ]);
        }

        Auth::login($user, true);

        return redirect()->intended('home');
    }

    public function index($step)
    {
        return view('auth.register', ['step' => $step]);
    }

    public function store(Request $request, $step)
    {
        $error = [];
        if ($step == 'data') {
            if ($request->name === null) {
                $error += ['name' => "Please provide your name"];
            }

            if ($request->email === null && $request->phone === null) {
                $error += ['email' => "Please provide your Email"];
                $error += ['phone' => "Please provide your Phone Number"];
            }
            if ($request->email != null) {
                if (User::where('email', $request->email)->exists()) {
                    $error += ['email' => "This email is already exists"];
                }
            }
            if ($request->email !== null) {
                if (User::where('email', $request->email)->exists()) {
                    $error['email'] = "This email is already exists";
                }
            }
            if ($request->month === null && $request->day === null && $request->year === null) {
                $error += ['dob' => "Please provide your Birthday"];
            }
            if ($error != null) {
                return back()->withInput($request->input())->withErrors($error);
            } else {
                return redirect()->route('singup', ['step' => 'password'])->withInput();
            }
        } elseif ($step == 'password') {

            if ($request->password === null) {
                $error += ['password' => "Please provide your password"];
            }

            if (strlen($request->password) < 8) {
                $error += ['password' => "Passwoed need more than 8 characters"];
            }

            if ($request->name != null) {
                $name = $request->input('name');
                $username = $this->generateUsername($name);
                if (User::where('user_name', $username)->exists()) {
                    $username = $this->generateUsername($name);
                }
            }
            $dob = $request->input('year') .'-' .$request->input('month').'-'.$request->input('day');
            if ($error != null) {
                return back()->withInput($request->input())->withErrors($error);
            } else {
                $user = new User();
                $user->name = $request->input('name');
                $user->user_name = $username;
                $user->email = $request->input('email');
                $user->phone = $request->input('phone');
                $user->dob = $dob;
                $user->password = Hash::make($request->input('password'));
                $user->save();
                Auth ::login($user);
                return redirect('/home');
            }        

        }
    }

    function generateUsername($name)
    {
        $username = strtolower($name);

        $username = str_replace(' ', '_', $username);

        $username .= rand(100, 999);

        return $username;
    }
}
