<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $page = Page::where(['slug' => 'search'])->firstOrFail();

        $resources = Resource::all();

        return view('pages.search', compact('page', 'resources'));
    }
}
