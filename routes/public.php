<?php

use Illuminate\Support\Facades\Route;

Route::name('public.')->group(function () {
    Route::get('/', function () {
        return view('public.home');
    })->name('home.index');

    Route::get('/profile', [App\Http\Controllers\Web\Public\Profile\ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Web\Public\Profile\ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

    // Anime
    Route::get('/animes', [App\Http\Controllers\Web\Public\Anime\AnimeController::class, 'index'])->name('animes.index');
    Route::get('/animes/watchlist', [App\Http\Controllers\Web\Public\Anime\AnimeWatchlistController::class, 'index'])->name('animes.watchlist.index')->middleware('auth');
    Route::get('/animes/schedule', [App\Http\Controllers\Web\Public\Anime\AnimeScheduleController::class, 'index'])->name('animes.schedule.index');
    Route::get('/animes/genres/{genre}', [App\Http\Controllers\Web\Public\Anime\AnimeController::class, 'genre'])->name('animes.genres.show');
    Route::get('/animes/{anime}', [App\Http\Controllers\Web\Public\Anime\AnimeController::class, 'show'])->name('animes.show');
    Route::get('/animes/{anime}/episodes/{episode}', [App\Http\Controllers\Web\Public\Anime\AnimeEpisodeController::class, 'show'])->name('animes.episodes.show');

    // Manga
    Route::get('/mangas', [App\Http\Controllers\Web\Public\Manga\MangaController::class, 'index'])->name('mangas.index');
    Route::get('/mangas/genres/{genre}', [App\Http\Controllers\Web\Public\Manga\MangaController::class, 'genre'])->name('mangas.genres.show');
    Route::get('/mangas/bookmark', [App\Http\Controllers\Web\Public\Manga\MangaBookmarkController::class, 'index'])->name('mangas.bookmark.index')->middleware('auth');
    Route::get('/mangas/{manga}', [App\Http\Controllers\Web\Public\Manga\MangaController::class, 'show'])->name('mangas.show');
    Route::get('/mangas/{manga}/chapters/{chapter}', [App\Http\Controllers\Web\Public\Manga\MangaChapterController::class, 'show'])->name('mangas.chapters.show');

    // News
    Route::get('/news', [App\Http\Controllers\Web\Public\News\NewsController::class, 'index'])->name('news.index');
    Route::get('/news/{news}', [App\Http\Controllers\Web\Public\News\NewsController::class, 'show'])->name('news.show');

    // AI Chat
    Route::prefix('ai')->name('ai.')->middleware('auth')->group(function () {
        Route::get('/chat/waifu', [App\Http\Controllers\Web\Public\Ai\Chat\WaifuController::class, 'index'])->name('chat.waifu.index');
        Route::get('/chat/document', [App\Http\Controllers\Web\Public\Ai\Chat\DocumentController::class, 'index'])->name('chat.document.index');
    });

    Route::prefix('other')->name('other.')->group(function () {
        Route::get('/social-media-downloader', [App\Http\Controllers\Web\Public\Other\SocialMediaDownloaderController::class, 'index'])->name('social-media-downloader.index');
    });

    Route::get('/store', function () {
        return redirect('https://buylink.id/weaboonesia');
    })->name('store');
});
