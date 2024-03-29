<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class isAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::check()){

            \View::share([
                'loggedUser' => User::find(Auth::id())
            ]);

            return $next($request);
        }
        else return redirect()->route('auth.login');
    }
}
