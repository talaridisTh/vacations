<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsEmployeeMiddleware {

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->isEmployee() == true) {
            return $next($request);
        }

        return redirect(RouteServiceProvider::ADMIN);
    }

}