<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        if (Auth::check()) {
           
            if (Auth::user()->admin == '1') {
                return $next($request);
                
            } else {     
                return abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
            }

        } else {
            return redirect('/login');
        }
    }
}
