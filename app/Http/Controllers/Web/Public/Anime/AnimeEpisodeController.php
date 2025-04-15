<?php

namespace App\Http\Controllers\Web\Public\Anime;

use App\Http\Controllers\Controller;
use App\Models\AnimeEpisodeHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class AnimeEpisodeController extends Controller
{
    public function show(string $anime, string $episode): View
    {
        $anime = Http::get(config('services.weaboo.api_url').'/samehadaku/anime/'.$anime, [
        ])->json();

        if (! $anime) {
            abort(404);
        }

        $episode = Http::get(config('services.weaboo.api_url').'/samehadaku/anime/'.$anime['id'].'/episodes/'.$episode, [
        ])->json();

        if (! $episode) {
            abort(404);
        }

        if (Auth::check()) {
            // update or create history
            AnimeEpisodeHistory::updateOrCreate(
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

            $histories = AnimeEpisodeHistory::where('user_id', Auth::id())
                ->where('anime_id', $anime['id'])
                ->get()
                ->pluck(['episode_id'])->toArray();
        } else {
            $histories = [];
        }

        $data = [
            'anime' => $anime,
            'episode' => $episode,
            'histories' => $histories,
        ];

        return view('public.anime.episode.show', $data);
    }
}
