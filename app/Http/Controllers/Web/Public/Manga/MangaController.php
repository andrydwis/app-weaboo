<?php

namespace App\Http\Controllers\Web\Public\Manga;

use App\Http\Controllers\Controller;
use App\Models\MangaChapterHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class MangaController extends Controller
{
    public function index(): View
    {
        $genres = Http::get(config('services.weaboo.api_url').'/manga/genres', [
        ])->json();

        $data = [
            'genres' => $genres,
        ];

        return view('public.manga.index', $data);
    }

    public function genre(string $genre): View
    {
        $data = [
            'genre' => $genre,
        ];

        return view('public.manga.genre', $data);
    }

    public function show(string $manga): View
    {
        $manga = Http::get(config('services.weaboo.api_url').'/manga/'.$manga, [
        ])->json();

        $histories = MangaChapterHistory::where('user_id', Auth::id())
            ->where('manga_id', $manga['id'])
            ->get()
            ->pluck(['chapter_id'])->toArray();

        $data = [
            'manga' => $manga,
            'histories' => $histories,
        ];

        return view('public.manga.show', $data);
    }
}
