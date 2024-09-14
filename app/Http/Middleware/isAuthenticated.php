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
            if(Auth::user()->active){
                \View::share([
                    'loggedUser' => User::find(Auth::id())
                ]);

                return $next($request);
            }else{
                /*
                 *  For users that have incoplete profile
                 */
                return redirect()->route('auth.create-new-profile');
            }
        }
        else return redirect()->route('auth.login');
    }
}
