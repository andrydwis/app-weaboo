<?php

namespace App\Http\Controllers\Web\Public\News;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = Http::get(config('services.weaboo.api_url').'/news/recent-news', [])->json();

        $data = [
            'news' => $news,
        ];

        return view('public.news.index', $data);
    }

    public function show(string $news): View
    {
        // convert base64 to string
        $news = str()->fromBase64($news);
        $news = Http::get(config('services.weaboo.api_url').'/news/get-news', ['id' => $news])->json();

        

        $data = [
            'news' => $news,
        ];

        return view('public.news.show', $data);
    }
}
