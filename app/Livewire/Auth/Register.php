<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Register extends Component
{   
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|confirmed',
            'role' => 'required|in:admin,employee',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
