<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Auth;
use Closure;
use Illuminate\Http\Request;

class IsAdminMiddleware {

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->isAdmin() == true) {
            return $next($request);
        }


        return redirect(RouteServiceProvider::HOME);

    }

}