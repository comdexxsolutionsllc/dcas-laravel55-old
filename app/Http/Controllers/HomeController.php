<?php

namespace App\Http\Controllers;

use Session;

class HomeController extends Controller
{
    protected $domain;

    /**
     * Create a new controller instance.
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
        $domain = $this->injectDomain();

        return view('home', compact(['domain']));
    }

    /**
     * Inject primary domain name into session.
     *
     * @return string
     */
    protected function injectDomain()
    {
        !Session::has('domain') ? Session::put('domain', auth()->user()->domain) : true;

        $this->setDomain(Session::get('domain'));

        is_null($this->getDomain()) ? $this->setDomain('null') : false;

        return $this->getDomain();
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }
}
