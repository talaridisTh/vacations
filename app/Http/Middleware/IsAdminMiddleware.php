<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Auth;
use Closure;
use Illuminate\Http\Request;

class IsAdminMiddleware {

    /**
     * Middleware for admin
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (Auth::user() && Auth::user()->isAdmin() == true) {
            return $next($request);
        }

        return redirect(RouteServiceProvider::HOME);
    }

}