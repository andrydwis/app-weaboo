<?php

namespace App\Http\Controllers\Web\Public\Anime;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class AnimeController extends Controller
{
    public function index(): View
    {
        $genres = Http::get(config('services.weaboo.api_url').'/anime/genres', [
        ])->json();

        $data = [
            'genres' => $genres,
        ];

        return view('public.anime.index', $data);
    }

    public function genre(string $genre): View
    {
        $data = [
            'genre' => $genre,
        ];

        return view('public.anime.genre', $data);
    }

    public function show(string $anime): View
    {
        $anime = Http::get(config('services.weaboo.api_url').'/anime/'.$anime, [
        ])->json();

        $data = [
            'anime' => $anime,
        ];

        return view('public.anime.show', $data);
    }
}
