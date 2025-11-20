<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\OtpVerification;

Route::middleware(['guest'])->group( function() {
    // Website routes
    Route::view('/', 'website.home')->name('home');
    Route::view('/about', 'website.about')->name('about');
    Route::view('/contacts', 'website.contacts')->name('contacts');
    Route::view('/careers', 'website.careers')->name('careers');
    Route::view('/application', 'website.application')->name('application');

    //Auth routes
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
    
});

Route::middleware(['auth'])->group( function() {
    // Employee routes
    Route::view('/dashboard', 'employee.dashboard')->name('dashboard');
});

Route::view('/otp-verification', 'auth.otp-verification')->name('otp.verify');