<?php

namespace App\Http\Controllers\Web\Public\Ai\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return view('public.ai.chat.document.index');
    }
}
