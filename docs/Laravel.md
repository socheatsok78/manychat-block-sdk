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

You may also change the active language at runtime using the `ManyChatLocale` middleware.

> You need to add the `ManyChatLocale` middleware to the `$middleware` property of your `app/Http/Kernel.php` file:
```php
use \ManyChat\Laravel\Middleware\ManyChatLocale;

protected $middleware = [
    ManyChatLocale::class,
];
```
