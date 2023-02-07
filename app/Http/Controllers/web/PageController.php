<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('web.page.index');
    }

    public function about_us()
    {
        return view('web.page.about ');
    }

    public function contact()
    {
        return view('web.page.contact ');
    }
}
