<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user is admin, continue with the request.
        if (!$request->user()->is_admin) {
            return $next($request);
        }

        // Otherwise, redirect to the home page.
        return redirect()->route('welcome');
    }
}
