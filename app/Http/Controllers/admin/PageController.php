<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.page.home');
    }

    public function deny()
    {
        return view('admin.page.deny');
    }
}
