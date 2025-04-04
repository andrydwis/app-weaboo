<?php

namespace App\Http\Controllers\Web\Public\Manga;

use App\Http\Controllers\Controller;
use App\Models\MangaChapterHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class MangaChapterController extends Controller
{
    public function show(string $manga, string $chapter): View
    {
        $manga = Http::get(config('services.weaboo.api_url').'/manga/'.$manga, [
        ])->json();

        $chapter = Http::get(config('services.weaboo.api_url').'/manga/chapters/'.$chapter, [
        ])->json();

        $chapters = $manga['chapters'];
        $chapterIndex = array_search($chapter['id'], array_column($chapters, 'id'));
        $nextChapter = $chapterIndex > 0 ? $chapters[$chapterIndex - 1] : null;
        $prevChapter = $chapterIndex < count($chapters) - 1 ? $chapters[$chapterIndex + 1] : null;

        // update or create history
        MangaChapterHistory::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'manga_id' => $manga['id'],
                'chapter_id' => $chapter['id'],
            ],
            [
                'user_id' => Auth::id(),
                'manga_id' => $manga['id'],
                'chapter_id' => $chapter['id'],
            ]
        );

        $data = [
            'manga' => $manga,
            'chapter' => $chapter,
            'chapters' => $chapters,
            'chapterIndex' => $chapterIndex,
            'nextChapter' => $nextChapter,
            'prevChapter' => $prevChapter,
        ];

        return view('public.manga.chapter.show', $data);
    }
}
