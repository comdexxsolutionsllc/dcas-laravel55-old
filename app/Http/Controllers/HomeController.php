<?php

namespace App\Http\Controllers;

use Session;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::has('domain')) {
            Session::put('domain', auth()->user()->domain);
        }

        $domain = Session::get('domain');

        return view('home', compact(['domain']));
    }
}
