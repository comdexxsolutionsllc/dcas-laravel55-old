<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Session;

class HomeController extends Controller
{
    /**
     * @var string
     */
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
     * @return Response
     */
    public function index(): Response
    {
        $domain = $this->injectDomain();

        return view('home', compact(['domain']));
    }

    /**
     * Inject primary domain name into session.
     *
     * @return string
     */
    protected function injectDomain(): string
    {
        !Session::has('domain') ? Session::put('domain', auth()->user()->domain) : true;

        $this->setDomain(Session::get('domain'));

        is_null($this->getDomain()) ? $this->setDomain('null') : false;

        return $this->getDomain();
    }

    /**
     * @return string
     */
    public function getDomain(): string
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
