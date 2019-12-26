<?php

namespace ManyChat\Laravel\Middleware;

use \Closure;
use ManyChat\Dynamic\Chat;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Routing\UrlGenerator;

class ManyChatAgent
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
    public function handle($request, Closure $next)
    {
        $userAgent = $request->header('User-Agent');

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

    /**
     * Check if request is from ManyChat
     *
     * @return boolean
     */
    protected function isManyChat()
    {
        $request = $this->request;

        $requestAgent = $request->header('User-Agent');

        $manyChatAgent = Chat::HEADER_USER_AGENT;

        return preg_match("/$manyChatAgent/i", $requestAgent);
    }
}
