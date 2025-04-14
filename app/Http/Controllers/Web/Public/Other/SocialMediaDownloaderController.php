<?php

namespace App\Http\Controllers\Web\Public\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SocialMediaDownloaderController extends Controller
{
    public function index(): View
    {
        return view('public.other.social-media-downloader.index');
    }
}
