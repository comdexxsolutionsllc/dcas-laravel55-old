<?php

namespace App\Http\Controllers;

use App\User;

class SearchController extends Controller
{
    /**
     * SearchController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Find a specific query.
     *
     * @return mixed
     */
    public function find()
    {
        return User::search(request()
            ->get('q'))
            ->with('profile')
            ->get();
    }
}
