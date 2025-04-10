<?php

namespace App\Http\Controllers\Web\Public\Anime;

use App\Http\Controllers\Controller;
use App\Models\AnimeEpisodeHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class AnimeController extends Controller
{
    public function index(): View
    {
        $genres = Http::get(config('services.weaboo.api_url').'/samehadaku/anime/genres', [
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
        $anime = Http::get(config('services.weaboo.api_url').'/samehadaku/anime/'.$anime, [
        ])->json();

        if (Auth::check()) {
            $histories = AnimeEpisodeHistory::where('user_id', Auth::id())
                ->where('anime_id', $anime['id'])
                ->orderBy('updated_at', 'desc')
                ->get()
                ->pluck(['episode_id'])->toArray();

            $lastHistory = $histories[0] ?? null;
        } else {
            $histories = [];

            $lastHistory = null;
        }

        $data = [
            'anime' => $anime,
            'histories' => $histories,
            'lastHistory' => $lastHistory,
        ];

        return view('public.anime.show', $data);
    }
}
