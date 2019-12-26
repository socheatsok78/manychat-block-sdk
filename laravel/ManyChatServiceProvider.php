<?php

namespace ManyChat\Laravel;

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

            if ($userAgent == 'ManyChat') {
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
            $subscriberHeader = $request->header('ManyChat-Subscriber-Key', '*');

            // If ManyChat-Subscriber-Key is set to *
            // use all request payload as Subscriber
            if ($subscriberHeader === '*') {
                return new Subscriber($request->all());
            }

            return new Subscriber($request->input($subscriberHeader));
        };
    }
}
