<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if( $guard === 'admin' ){
                Session::flash('atencao','Você não pode estar logado para poder entrar nessa página.');
                return redirect('/admin');
            }else{
                Session::flash('atencao','Você não pode estar logado para poder entrar nessa página.');
                return redirect('/');
            }

        }

        return $next($request);
    }
}
