<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Request;

class SearchController extends Controller
{
    /**
     * Find a specific query.
     *
     * @param Request $request
     *
     * @return Collection
     */
    public function find(Request $request): Collection
    {
        return User::search(
            $query = $request->get('q')
        )
            ->with('profile')
            ->get();
    }

    /**
     * Alias of find function.
     *
     * @param Request $request
     *
     * @return Collection
     */
    public function search(Request $request): Collection
    {
        return $this->find();
    }
}
