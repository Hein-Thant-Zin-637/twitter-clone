<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $password, $password_confirmation, $original_password;
    public $error;

    public function changePassword()
    {
        $user = User::find(auth()->user()->id);
        if($this->password === null) {
            $this->error['password'] = "Please provide a passowrd";
        }
        if($this->password_confirmation === null) {
            $this->error['password_confirmation'] = "Please provide a Confirm Password";
        }
        if($this->original_password === null) {
            $this->error['original_password'] = "Please provide original passowrd";
        }
        if($this->password !== $this->password_confirmation ){
            $this->error['password_confirmation'] = "This password is not same your password";
        }
        if (!(Hash::check($this->original_password, $user->password))) {
            $this->error['original_password'] = "Your Original password is not incorrect";
        }
        if($this->error == null){
            $user->password = $this->password;
            $user->save();
            $this->password = null;
            $this->password_confirmation =null;
            $this->original_password = null;
        }
       
    }
    
    public function render()
    {
        return view('livewire.change-password');
    }
}
