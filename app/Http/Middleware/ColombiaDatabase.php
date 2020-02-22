<?php

namespace App\Http\Middleware;

use Closure;

class ColombiaDatabase
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
        app()->config->set("database.default", "colombia");
        return $next($request);
    }
}
