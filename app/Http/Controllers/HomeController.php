<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function ojs()
    {
        return view('pages.ojs');
    }
}
