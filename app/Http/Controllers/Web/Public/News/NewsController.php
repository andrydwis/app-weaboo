<?php

namespace App\Http\Controllers\Web\Public\News;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = Http::get(config('services.weaboo.api_url').'/news/recent', [])->json();

        $data = [
            'news' => $news,
        ];

        return view('public.news.index', $data);
    }

    public function show(string $news): View
    {
        $news = Http::get(config('services.weaboo.api_url').'/news/'.$news, [])->json();

        $data = [
            'news' => $news,
        ];

        return view('public.news.show', $data);
    }
}
