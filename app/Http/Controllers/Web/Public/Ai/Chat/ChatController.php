<?php

namespace App\Http\Controllers\Web\Public\Ai\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChatController extends Controller
{
    public function index(): View
    {
        return view('public.ai.chat.index');
    }
}
