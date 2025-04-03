<?php

namespace App\Http\Controllers\Web\Public\Anime;

use App\Http\Controllers\Controller;
use App\Models\AnimeEpisodeHistories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class AnimeEpisodeController extends Controller
{
    public function show(string $anime, string $episode): View
    {
        $anime = Http::get(config('services.weaboo.api_url').'/anime/'.$anime, [
        ])->json();

        $episode = Http::get(config('services.weaboo.api_url').'/anime/'.$anime['id'].'/episodes/'.$episode, [
        ])->json();

        // update or create history
        AnimeEpisodeHistories::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'anime_id' => $anime['id'],
                'episode_id' => $episode['episode_id'],
            ],
            [
                'user_id' => Auth::id(),
                'anime_id' => $anime['id'],
                'episode_id' => $episode['episode_id'],
            ]
        );

        $histories = AnimeEpisodeHistories::where('user_id', Auth::id())
            ->where('anime_id', $anime['id'])
            ->get()
            ->pluck(['episode_id'])->toArray();

        $data = [
            'anime' => $anime,
            'episode' => $episode,
            'histories' => $histories,
        ];

        return view('public.anime.episode.show', $data);
    }
}
