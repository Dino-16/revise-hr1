<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();

            // Generate OTP
            $otp = rand(100000, 999999);

            // Store OTP in session
            session([
                'otp' => $otp,
                'otp_expires' => Carbon::now()->addMinutes(5),
                'user_id' => $user->id,
            ]);

            // Send OTP email
            Mail::raw("Your OTP code is: {$otp}", function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Login OTP Verification');
            });

            // Redirect to OTP verification component
            return redirect()->route('otp.verify');
        }
    }


    public function render()
    {
        return view('livewire.auth.login');
    }
}
