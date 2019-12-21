<img alt="Dynamic Content Block" src="resources/dynamic-content-block.png" style="border-radius: 10px;">

# ManyChat Block SDK

Send any message block, like text, gallery, list and others. Attach buttons with custom payloads to continue interaction.

Trigger actions in ManyChat, like tagging a user, setting a Custom Field or notifying an admin.

#### Example code:

```php
namespace App\Http\Controllers\Flow;

use ManyChat\Dynamic\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $chat = new Chat();

        $text = new Text('Welcome to ManyChat Dynamic Response');
        $chat->reply($text);

        return $chat;
    }
}
```
#### Example response:

```json
{
    "version": "v2",
    "content": {
        "messages": [
            {
                "type": "text",
                "text": "Welcome to ManyChat Dynamic Response"
            }
        ],
        "actions": [],
        "quick_replies": []
    }
}
```

### ManyChat Docs
- [ManyChat Developer Tools](https://devtools.manychat.com/)
- [ManyChat API](https://api.manychat.com)
- [Response Reference](https://manychat.github.io/dynamic_block_docs/)
