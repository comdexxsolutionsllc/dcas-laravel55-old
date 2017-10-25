<?php

namespace App\Http\Middleware;

use Closure;

class JsonpResponse
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if ($request->has('callback')) {
            $response->setCallback($request->input('callback'));
        }
        return $response;
    }
}