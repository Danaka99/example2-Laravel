<?php

use Illuminate\Support\Facades\Route;


Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/home', function () {
    return view('home');
});
