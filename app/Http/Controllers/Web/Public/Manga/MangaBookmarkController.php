<?php

namespace App\Http\Controllers\Web\Public\Manga;

use App\Http\Controllers\Controller;
use App\Models\MangaBookmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MangaBookmarkController extends Controller
{
    public function index(): View
    {
        $bookmarks = MangaBookmark::where('user_id', Auth::id())->get();

        $data = [
            'bookmarks' => $bookmarks,
        ];

        return view('public.manga.bookmark.index', $data);
    }
}
