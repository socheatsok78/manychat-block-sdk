<?php

namespace ManyChat\Laravel\Middleware;

use \Closure;
use ManyChat\Dynamic\Chat;

class ManyChatAgent
{

    /**
     * Create a new middleware instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userAgent = $request->header('User-Agent');

        if (Chat::HEADER_USER_AGENT !== $userAgent) {
            return abort(406, "Invalid ManyChat Agent");
        }

        return $next($request);
    }
}
