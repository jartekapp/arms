<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store()
    {
        return redirect()->back()->with(['status' => 'Thank you for your message!']);
    }
}
