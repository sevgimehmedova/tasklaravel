<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyEmail
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('email.verify');
        }

        return $next($request);
    }
}
