<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/member', function () {
    return view('member');
})->name('member');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');
