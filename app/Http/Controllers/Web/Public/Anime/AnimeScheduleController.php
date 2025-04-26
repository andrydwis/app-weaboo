<?php

namespace App\Http\Controllers\Web\Public\Anime;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AnimeScheduleController extends Controller
{
    public function index(): View
    {
        return view('public.anime.schedule.index');
    }
}
