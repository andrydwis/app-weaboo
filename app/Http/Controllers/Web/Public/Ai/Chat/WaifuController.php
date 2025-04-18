<?php

namespace App\Http\Controllers\Web\Public\Ai\Chat;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class WaifuController extends Controller
{
    public function index(): View
    {
        return view('public.ai.chat.waifu.index');
    }
}
