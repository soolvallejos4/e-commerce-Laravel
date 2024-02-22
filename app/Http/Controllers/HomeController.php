<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{
    public function home()
    {
        $news = News::all();

        return view('home', [
            'news' => $news
        ]);
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
}
