<?php

namespace ManyChat\Laravel\Middleware;

use Closure;
use Exception;
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
        $this->shouldChangeLocale();

        return $next($request);
    }

    /**
     * Get the locale attribute
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function locale($request)
    {
        return $request->input('locale');
    }

    /**
     * Check if request has locale
     *
     * @return boolean
     */
    protected function requestHasLocale()
    {
        try {
            if ($this->locale($this->request)) {
                return true;
            }

            return false;
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Should change locale
     *
     * @return void
     */
    protected function shouldChangeLocale()
    {
        if ($this->isManyChat() && $this->requestHasLocale()) {
            $locale = $this->getLocaleAttribute();

            App::setLocale($locale);
        }
    }

    /**
     * Get the locale value
     *
     * @return string
     */
    protected function getLocaleAttribute()
    {
        $locale = $this->locale($this->request);

        $explodedLocale = explode("_", $locale);

        $lang = $explodedLocale[0];

        return $lang;
    }
}
