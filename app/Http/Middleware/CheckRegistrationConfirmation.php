<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRegistrationConfirmation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        return session()->get('status');
        if($request->session()->get('status') === 'success' || $request->session()->get('status') === 'failed') {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
