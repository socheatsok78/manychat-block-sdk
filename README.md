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

# Contents
- [Messages](#Messages)
- [Attachments](#Attachments)
- [Buttons](#Buttons)
- [Actions](#Actions)
- [Quick Reply](#Quick-Reply)

## Messages
Create a message block like Text, List or Card.

### Text
Create a `Text` message block for sending text messages.

The `Url`, `Flow`, `Node` and `Call` buttons can be used with `Text` block.

```php
$text = new Text('Example text message');

# or

$text = Text::create('Example text message');
```

### List
Create a list message block, a set of items vertically. There are two types of list `CompactList` and `LargeList`.

- `CompactList`  renders each item identically and is useful for presenting a list of items where no item is shown prominently.

- `LargeList` renders the first item with a cover image with text overlaid

The `Url`, `Flow`, `Node`, `Call` and `Buy` buttons can be used with `List` block.

> Note: We strongly suggest to use HTTPS protocol for your URLs

```php
# You need to create at lease 2 Element block
$element_1 = new Element([/* ... */]);
$element_2 = new Element([/* ... */]);

$compactList = new CompactList([$element_1, $element_2]);
$largeList = new LargeList([$element_1, $element_2]);
```

### Card
Create a horizontal scrollable gallery. There are two types of card `SquareCard` and `HorizontalCard`.

The `Url`, `Flow`, `Node`, `Call` and `Buy` buttons can be used with `Card` block.

> Note: We strongly suggest to use HTTPS protocol for your URLs

```php
# You need to create at lease 2 Element block
$element_1 = new Element([/* ... */]);
$element_2 = new Element([/* ... */]);

$horizontalCard = new HorizontalCard([$element_1, $element_2]);
$squareCard = new SquareCard([$element_1, $element_2]);
```

### Element
Create a element block. It can only be used on `List` or `Card` block.

The `Url`, `Flow`, `Node`, `Call` and `Buy` buttons can be used with `Element` block.

> Note: We strongly suggest to use HTTPS protocol for your URLs

```php
$element = new Element();
$element->title = 'Unsplash';
$element->subTitle = 'Photos for everyone';
$element->imageUrl = 'https://source.unsplash.com/random';
$element->actionUrl = 'https://unsplash.com';

# or

$element = new Element([
    'title' => 'Unsplash',
    'subTitle' => 'Photos for everyone',
    'imageUrl' => 'https://source.unsplash.com/random',
    'actionUrl' => 'https://unsplash.com',
]);
```

## Attachments
Create a attachment block like File, Image, Audio and Video.

### File
Create a file block to send any other files, which are no larger than 25 MB.

> Note: We strongly suggest to use HTTPS protocol for your URLs

```php
$file = new File('/* URL to the file */');

# or

$file = File::url('/* URL to the file */');
```

### Image
Create an image block to send an image. `Image` supports JPG, PNG and GIF images.

The `Url`, `Flow`, `Node`, `Call` and `Buy` buttons can be used with `Element` block.

> Note: We strongly suggest to use HTTPS protocol for your URLs

```php
$image = new Image('https://source.unsplash.com/random');

# or

$image = Image::url('https://source.unsplash.com/random');
```

### Audio
Create an audio block send audio files, which are no larger than 25 MB.

The `Url`, `Flow`, `Node`, `Call` and `Buy` buttons can be used with `Element` block.

> Note: We strongly suggest to use HTTPS protocol for your URLs

```php
$audio = new Audio('/* URL to the audio file */');

# or

$audio = Audio::url('/* URL to the audio file */');
```

### Video
Create an video block send video files, which are no larger than 25 MB.

The `Url`, `Flow`, `Node`, `Call` and `Buy` buttons can be used with `Element` block.

> Note: We strongly suggest to use HTTPS protocol for your URLs

```php
$video = new Video('/* URL to the video file */');

# or

$video = Video::url('/* URL to the video file */');
```

## Buttons
Coming soon...

## Actions
Coming soon...

## Quick Reply
Coming soon...

## License
Licensed under the [MIT](LICENSE)
