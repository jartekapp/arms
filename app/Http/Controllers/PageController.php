<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function show($slug = 'home')
    {
        $page = Page::where(compact('slug'))->firstOrFail();

        return view('welcome', compact('page'));
    }
}
