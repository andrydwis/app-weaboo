<?php

namespace App\Http\Controllers\Web\Public\News;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = Cache::remember('news', 3600, function () {
            return Http::get(config('services.weaboo.api_url').'/news/recent', [])->json();
        });

        if (! $news) {
            $news = [];
        }

        $data = [
            'news' => $news,
        ];

        return view('public.news.index', $data);
    }

    public function show(string $news): View
    {
        $news = Cache::remember('news-'.$news, 3600, function () use ($news) {
            return Http::get(config('services.weaboo.api_url').'/news/'.$news, [])->json();
        });

        if (! $news) {
            abort(404);
        }

        $data = [
            'news' => $news,
        ];

        return view('public.news.show', $data);
    }
}
