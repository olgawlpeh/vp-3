<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    public function handle($request, Closure $next)
    {

        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
