<?php

namespace App\Http\Controllers\Web\Public\Anime;

use App\Http\Controllers\Controller;
use App\Models\AnimeWatchlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AnimeWatchlistController extends Controller
{
    public function index(): View
    {
        $watchlist = AnimeWatchlist::where('user_id', Auth::id())->get();

        $data = [
            'watchlist' => $watchlist,
        ];

        return view('public.anime.watchlist.index', $data);
    }
}
