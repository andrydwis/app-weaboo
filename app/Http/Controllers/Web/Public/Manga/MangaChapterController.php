<?php

namespace App\Http\Controllers\Web\Public\Manga;

use App\Http\Controllers\Controller;
use App\Models\MangaChapterHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class MangaChapterController extends Controller
{
    public function show(string $manga, string $chapter): View
    {
        $manga = Cache::remember('manga-'.$manga, 3600, function () use ($manga) {
            return Http::get(config('services.weaboo.api_url').'/manga/'.$manga, [
            ])->json();
        });

        if (! $manga) {
            abort(404);
        }

        $chapter = Cache::remember('manga-'.$manga['id'].'-chapter-'.$chapter, 3600, function () use ($manga, $chapter) {
            return Http::get(config('services.weaboo.api_url').'/manga/'.$manga['id'].'/chapters/'.$chapter, [
            ])->json();
        });

        if (! $chapter) {
            abort(404);
        }

        $chapters = $manga['chapters'];
        $chapterIndex = array_search($chapter['id'], array_column($chapters, 'id'));
        $nextChapter = $chapterIndex > 0 ? $chapters[$chapterIndex - 1] : null;
        $prevChapter = $chapterIndex < count($chapters) - 1 ? $chapters[$chapterIndex + 1] : null;

        if (Auth::check()) {
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
        }

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
