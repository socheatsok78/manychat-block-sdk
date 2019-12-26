<?php

namespace ManyChat\Laravel;

use ManyChat\Dynamic\Chat;
use ManyChat\Dynamic\Subscriber;
use Illuminate\Support\ServiceProvider;

class ManyChatServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRequestRebindHandler();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Handle the re-binding of the request binding.
     *
     * @return void
     */
    protected function registerRequestRebindHandler()
    {
        $this->app->rebinding('request', function ($app, $request) {
            $userAgent = $request->header('User-Agent');

            if (Chat::HEADER_USER_AGENT == $userAgent) {
                $request->setUserResolver(function ($guard = null) use ($app, $request) {
                    return call_user_func($this->getSubscriberResolver($request), $guard);
                });
            }
        });
    }

    /**
     * Resolve ManyChat Subscriber
     *
     * @return \Closure
     */
    protected function getSubscriberResolver($request)
    {
        return function ()  use ($request) {
            $header = $request->header('ManyChat-Subscriber-Key', '*');
            $payload = $request->all();

            if ($header == '*') {
                $payload = $request->input($header);
            }

            // Check if $payload is ManyChat Subscriber data
            if (in_array('live_chat_url', $payload) && in_array('last_input_text', $payload)) {
                return new Subscriber($payload);
            }

            return;
        };
    }
}
