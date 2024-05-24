<?php

namespace App\Http\Middleware;

use App\Models\Other\PublicNotification;
use Closure;

class PublicMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        \View::share([
            'publicNot' => PublicNotification::whereDate('from', '<=', date('Y-m-d'))->whereDate('to', '>=', date('Y-m-d'))->first()
        ]);

        return $next($request);
    }
}
