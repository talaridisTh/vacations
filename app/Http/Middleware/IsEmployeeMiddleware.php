<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsEmployeeMiddleware {

    /**
     * Middleware for Employee
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    protected function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->isEmployee() == true) {
            return $next($request);
        }

        return redirect(RouteServiceProvider::ADMIN);
    }

}