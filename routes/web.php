<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('public.home.index');

include __DIR__.'/auth.php';
