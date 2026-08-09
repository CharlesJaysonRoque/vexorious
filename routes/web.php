<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Route::view('/home', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/member', 'member')->name('member');
Route::view('/gallery', 'gallery')->name('gallery');
Route::view('/rules', 'rules')->name('rules');
Route::view('/world-map', 'map')->name('map');

Route::get('/ping', function () {
    return response('pong', 200);
})->name('ping');
