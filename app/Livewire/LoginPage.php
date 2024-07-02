<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginPage extends Component
{
    public $name;
    public $password;

    public function login(){
        $validated = $this->validate([
            'name' => 'required|min:5',
            'password' => 'required|min:5'
        ]);

        if(Auth::attempt($validated)){
            session()->regenerate();
            return redirect()->to('/celengan/user/'. auth()->id());
        }

        session()->flash('failed', 'Username / Password Salah!');
        return redirect()->to('/login');
    }


    public function render()
    {
        return view('livewire.login-page');
    }
}
