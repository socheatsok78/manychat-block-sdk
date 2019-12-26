<?php

namespace ManyChat\Laravel\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use ManyChat\Laravel\Middleware\ManyChatMiddleware;

class ManyChatLocale extends ManyChatMiddleware
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
        if ($request->has('locale')) {
            $locale = $this->getLocaleAttribute();

            App::setLocale($locale);
        }

        return $next($request);
    }

    /**
     * Get the locale attribute
     *
     * @return string
     */
    public function locale()
    {
        return $this->request->input('locale');
    }

    /**
     * Get the locale value
     *
     * @return string
     */
    public function getLocaleAttribute()
    {
        $locale = $this->locale();

        $explodedLocale = explode("_", $locale);

        $lang = $explodedLocale[0];

        return $lang;
    }
}
