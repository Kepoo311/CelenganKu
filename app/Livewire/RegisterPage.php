<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterPage extends Component
{
    public $name;
    public $password;
    public $password_confirmation;

    public function register(){
        $validated = $this->validate([
            'name' => 'required|min:5|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        User::create($validated);

        return redirect()->to('/login');
    }

    public function render()
    {
        return view('livewire.register-page');
    }
}
