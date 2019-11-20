<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $array_languages=config('page.lang');
        if(in_array($request->segment(1),$array_languages)){
            \Session::put('lang', $request->segment(1));
        }
        if (\Session::has('lang') and in_array(\Session::get('lang'), $array_languages)) {
            \App::setLocale(\Session::get('lang'));
        }
        else{
            \Session::put('lang', \App::getLocale());
        }
        return $next($request);
    }
}
