<?php

namespace App\Http\Controllers\Web\Public\Anime;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AnimeEpisodeController extends Controller
{
    public function show(string $anime, string $episode): View
    {
        return view('public.anime.episode.show');
    }
}
