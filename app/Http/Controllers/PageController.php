<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class PageController extends Controller
{
    public function about(){
        $page = Page::where('slug', 'about')->firstOrFail();
        return view('pages.about', compact('page'));
    }

    public function policy(){
        $page = Page::where('slug', 'policy')->firstOrFail();
        return view('pages.policy', compact('page'));
    }
}
