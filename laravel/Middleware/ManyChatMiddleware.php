<?php

namespace ManyChat\Laravel\Middleware;

use \Closure;
use ManyChat\Dynamic\Chat;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Routing\UrlGenerator;

abstract class ManyChatMiddleware
{
    /**
     * The response factory instance.
     *
     * @var \Illuminate\Contracts\Routing\ResponseFactory
     */
    protected $responseFactory;

    /**
     * The URL generator instance.
     *
     * @var \Illuminate\Contracts\Routing\UrlGenerator
     */
    protected $urlGenerator;

    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Routing\ResponseFactory  $responseFactory
     * @param  \Illuminate\Contracts\Routing\UrlGenerator  $urlGenerator
     * @return void
     */
    public function __construct(Request $request, ResponseFactory $responseFactory, UrlGenerator $urlGenerator)
    {
        $this->request = $request;
        $this->responseFactory = $responseFactory;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    abstract public function handle($request, Closure $next);

    /**
     * Check if request is from ManyChat
     *
     * @return boolean
     */
    protected function isManyChat()
    {
        // Always return true if Laravel debug mode is on
        if (config('app.debug')) {
            return true;
        }

        $request = $this->request;

        $requestAgent = $request->header('User-Agent');

        $manyChatAgent = Chat::HEADER_USER_AGENT;

        return preg_match("/$manyChatAgent/i", $requestAgent);
    }
}
