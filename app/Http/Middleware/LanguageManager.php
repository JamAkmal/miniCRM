<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has("locale")){
            App::setLocale(session()->get("locale"));
        }else{
            session()->put("locale","en");
            App::setLocale(session()->get("locale"));
        }
        return $next($request);
    }
}
