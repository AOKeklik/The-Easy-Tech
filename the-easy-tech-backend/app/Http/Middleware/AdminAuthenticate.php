<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check())
            return redirect()->route("admin.signin.view")->with("error","You must be logged in as an admin to access this page!");

        if(auth()->user()->role !== "admin"){
            auth()->logout();
            return redirect()->route("admin.signin.view")->with("error","You must be logged in as an admin to access this page!");
        }

        return $next($request);
    }
}
