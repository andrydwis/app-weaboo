<?php

use Illuminate\Support\Facades\Route;

Route::name('public.')->group(function () {
    Route::get('/', function () {
        return view('public.home');
    })->name('home.index');
    Route::get('/animes', [App\Http\Controllers\Web\Public\Anime\AnimeController::class, 'index'])->name('animes.index');
    Route::get('/animes/{anime}', [App\Http\Controllers\Web\Public\Anime\AnimeController::class, 'show'])->name('animes.show');
});
