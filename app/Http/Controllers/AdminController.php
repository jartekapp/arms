<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function index($slug = 'home')
    {
        $page = Page::where(compact('slug'))->first();

        return view('admin', compact('page' ));
    }

    public function update($slug = 'home')
    {
        // return request()->all();
        $page = Page::where(compact('slug'))->firstOrFail();

        collect(request('fields', []))->each(function ($content, $slug) use ($page) {
            $field = $page->fields()->where(compact('slug'))->firstOrFail();

            if ('repeater' === $field->type) {
                $content = collect($field->content)->map(function ($repeaterGroup, $repeaterGroupIndex) use ($content) {
                    $content = $content[$repeaterGroupIndex];

                    return collect($repeaterGroup)->map(function ($subField) use ($content) {
                        $content = $content[$subField->slug];

                        if ('boolean' === $subField->type) {
                            $content = !! $content;
                        }

                        $subField->content = $content;

                        return $subField;
                    });
                });
            }

            if ('boolean' === $field->type) {
                $content = !! $content;
            }

            $field->update(compact('content'));
        });

        return redirect()->back()->with('status', 'Saved page');
    }
}
