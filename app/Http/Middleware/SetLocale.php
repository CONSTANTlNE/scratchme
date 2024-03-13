<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $langs=Language::pluck('abbr')->toArray();
        $main=Language::where('main',1)->pluck('abbr');
//        dd($main);
        $locale=$request->segment(1);
        if (in_array($locale, $langs, )) {
            app()->setLocale($request->segment(1));
            URL::defaults(['locale' => $request->segment(1)]);
        } else{
            app()->setLocale($main[0]);
            URL::defaults(['locale' => $main[0]]);
        }

        return $next($request);
    }
}
