# [←](README.md) ManyChat Block SDK \w Laravel
ManyChat Block SDK is fully support Laravel framework.

### Subscriber
If you're using Laravel, you can access `Subscriber` data from `Illuminate\Http\Request` instance.
The `ManyChatServiceProvider` will register the `Subscriber` data as `$request->user()`

> To access `Subscriber` data please make sure to add [Full Subscriber Data](FullSubscriberData.md) to your `DynamicBlock` request body.

```php
use Illuminate\Http\Request;

class WelcomeMessage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $subscriber = $request->user();
    }
}
```

If you wish to customize the `DynamicBlock` request body, please make sure that you've also provide `ManyChat-Subscriber-Key` Http header with the value of your subscriber key in your request body.

Example `DynamicBlock` request body:
```json
{
    "first_name": "{{first_name|fallback:""|to_json:true}}",
    "last_name": "{{last_name|fallback:""|to_json:true}",
    "custom_key": "value",
    "my_subscriber": "{{subscriber_data|fallback:""|to_json:true}}"
}
```

Then set the `ManyChat-Subscriber-Key` request header value to `my_subscriber`.

## Middleware
ManyChat Block SDK has multiple type of middleware that you can use.

To limit routes to only `ManyChat` please use the `ManyChatAgent` middleware.

> You need to add the `ManyChatAgent` middleware to the `$routeMiddleware` property of your `app/Http/Kernel.php` file:

```php
use \ManyChat\Laravel\Middleware\ManyChatAgent;

protected $routeMiddleware = [
    'manychat' => ManyChatAgent::class,
];
```

### Localize `Dynamic Block` response
You may also change the active language at runtime using the `ManyChatLocale` middleware. This allow you to use Laravel built-in localization system to response `Dynamic Block` content with the language of choice from your `Subscriber`.

> You need to add the `ManyChatLocale` middleware to the `$middleware` property of your `app/Http/Kernel.php` file:

```php
use \ManyChat\Laravel\Middleware\ManyChatLocale;

protected $middleware = [
    ManyChatLocale::class,
];
```

By default `ManyChatLocale` middleware check the `locale` key from your `Subscriber`. But if you want to use other property instead you can extend the default `ManyChatLocale` middleware and customize the `locale` method in your newly created `Middleware`. See example below:

Create new middleware in your laravel project:

```sh
php artisan make:middleware ManyChatLocalize
```

Now open `ManyChatLocalize` in the folder `app/Http/Middleware`. See example below:

```php
namespace App\Http\Middleware;

use Closure;

class ManyChatLocalize
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
        return $next($request);
    }
}
```

And extend `ManyChatLocalize` with `ManyChatLocale`, update the `handle` method and then override `locale` method see example below:

```php
namespace App\Http\Middleware;

use Closure;
use ManyChat\Laravel\Middleware\ManyChatLocale;

class ManyChatLocalize extends ManyChatLocale
{
    /**
     * Get the locale attribute
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function locale($request)
    {
        $customFields = $request->input('custom_fields');

        $locale = array_key_exists('language', $customFields)
            ? $customFields['language']
            : config('app.locale');

        return $locale;
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
        return parent::handle($request, $next);
    }
}
```
