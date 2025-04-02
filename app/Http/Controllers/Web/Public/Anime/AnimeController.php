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

        $animes = Http::get(config('services.weaboo.api_url').'/anime/ongoing', [
        ])->json();

        $data = [
            'genres' => $genres,
            'animes' => $animes['animes'],
        ];

        return view('public.anime.index', $data);
    }
}
