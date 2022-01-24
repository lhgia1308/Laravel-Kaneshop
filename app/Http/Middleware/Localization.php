<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use App\Model\BusinessSetting;

class Localization
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
        // echo "call handle Localization";
        $locale = session()->get('locale') ;
        if ($locale==""){
            $default_language = BusinessSetting::where('type','default_language')->first();
            $locale = "en";
            if(isset($default_language)){
                $locale = $default_language['value'];
            }
            session()->put('locale', $locale);
        }
        App::setLocale($locale);
        // echo 'locale1111: '. app()->getLocale();
        // if (session()->has('locale')) {
        //     App::setLocale(session()->get('locale'));
        // }
        return $next($request);
    }
}
