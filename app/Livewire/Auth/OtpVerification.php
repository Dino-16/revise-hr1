<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OtpVerification extends Component
{
    public $otp;

    public function verifyOtp()
    {
        $storedOtp = session('otp');
        $expiresAt = session('otp_expires');
        $userId = session('user_id');

        if ($this->otp == $storedOtp && now()->lt($expiresAt)) {
            Auth::loginUsingId($userId);

            session()->forget(['otp', 'otp_expires', 'user_id']);

            return redirect()->intended('dashboard');
        } else {
            $this->addError('otp', 'Invalid or expired OTP.');
        }
    }

    public function resendOtp()
    {
        $userId = session('user_id');
        $user = \App\Models\User::find($userId);

        if ($user) {
            $otp = rand(100000, 999999);

            session([
                'otp' => $otp,
                'otp_expires' => Carbon::now()->addMinutes(5),
                'user_id' => $user->id,
            ]);

            Mail::raw("Your new OTP code is: {$otp}", function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Resent Login OTP Verification');
            });

            session()->flash('status', 'A new OTP has been sent to your email.');
        }
    }

    public function render()
    {
        return view('livewire.auth.otp-verification');
    }
}