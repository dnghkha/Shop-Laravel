<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangController extends Controller
{
    var $langs = ['en' => 'English', 'vi' => 'Tiếng Việt'];
    public function switchLang($lang)
    {
        if (isset($this->langs[$lang])) {
            session(['lang' => $lang]);
        }
        return redirect()->route('home');
    }
}
