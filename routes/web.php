<?php

use Illuminate\Support\Facades\Route;

// Application routes
Route::view('/', 'website.home')->name('home');
Route::view('/careers', 'website.careers')->name('careers');
Route::view('/application', 'website.application')->name('application');