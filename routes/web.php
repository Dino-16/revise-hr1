<?php

use Illuminate\Support\Facades\Route;

// Website routes
Route::middleware(['guest'])->group( function() {
Route::view('/', 'website.home')->name('home');
Route::view('/about', 'website.about')->name('about');
Route::view('/contacts', 'website.contacts')->name('contacts');
Route::view('/careers', 'website.careers')->name('careers');
Route::view('/application', 'website.application')->name('application');

//Auth routes
Route::view('/login', 'auth.login')->name('login');
});
