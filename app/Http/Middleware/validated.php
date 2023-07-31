<?php

namespace App\Http\Middleware;

use Closure;

class validated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $response = $next($request);
        $response->withCookie("validated","yes");
        return $response;
    }
}
