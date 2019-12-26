<?php

namespace ManyChat\Laravel\Middleware;

use Closure;
use ManyChat\Laravel\Middleware\ManyChatMiddleware;

class ManyChatAgent extends ManyChatMiddleware
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
        if (!$this->isManyChat()) {
            $statusCode = 406;
            $errorMessage = "Invalid ManyChat Agent";

            if ($request->acceptsHtml()) {
                return abort($statusCode, $errorMessage);
            }

            return $this->responseFactory->json([
                'message' => $errorMessage,
            ], $statusCode);
        }

        return $next($request);
    }
}
