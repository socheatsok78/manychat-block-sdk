# Changelogs
- [v1.0.8](#108)
- [v1.0.7](#107)
- [v1.0.6](#v106)
- [v1.0.5](#v105)
- [v1.0.4](#v104)
- [v1.0.3](#v103)
- [v1.0.2](#v102)
- [v1.0.1](#v101)
- [v1.0.0](#v100)

<!-- v1.0.8 -->
# v1.0.8

### Fixes
- 94b9e50: Fix `Concerns/HasButton` method not returning the current instance
- a12c1b9: Fix `Concerns/HasAction` method not returning the current instance

<!-- v1.0.7 -->
# v1.0.7

### Fixes
- 9fbd876: Update `ManyChatMiddleware@isManyChat` method to check `app.env` instead of `app.debug` config variable.

<!-- v1.0.6 -->
## v1.0.6
Laravel Supplemental Update

### New
- ManyChat middleware for Laravel
  - [ManyChatAgent.php](https://github.com/socheatsok78/manychat-block-sdk/blob/v1.0.6/laravel/Middleware/ManyChatAgent.php)
  - [ManyChatLocale.php](https://github.com/socheatsok78/manychat-block-sdk/blob/v1.0.6/laravel/Middleware/ManyChatLocale.php)

See [ManyChat Block SDK \w Laravel](docs/Laravel.md) for mor information.

### Improvements
- 44c9894: Allow developer to inspect response from local development when  `app.debug` is set `true`

<!-- v1.0.5 -->
## v1.0.5

### Fixes
- 2db71f7: Fix `Foundation/Subscriber.php`, method `field` and `customField` check item in array using the wrong method `in_array` which should be `array_key_exists`

### Improvements
- 7ab61b4: Improve `Laravel/Middleware/ManyChatAgent`, using regular expression to detect ManyChat request

<!-- v1.0.4 -->
## v1.0.4

### Fixes
- 41000ce: Fix `ManyChatServiceProvider` not creating `Subscriber` instance

### New
- `ManyChatAgent` middleware for Laravel

<!-- v1.0.3 -->
## v1.0.3
Supplemental update

### New
- Add `Chat::UserAgent` static property to get ManyChat HTTP Request `User-Agent` value

### Improvements
- Improve `ManyChatServiceProvider`'s `Subscriber` discovery

<!-- v1.0.2 -->
## v1.0.2

### Improvements
- 95bc78b: Add Laravel service discovery
  > Enhance `$request` handled by Laravel by register `Subscriber` as `$request->user()`
  > Check [Full Subscriber Data](docs/FullSubscriberData.md) for more information

<!-- v1.0.1 -->
## v1.0.1

### Fixes
- 2e1b502: Fix Callback/ExternalCallback.php, remove $caption
- 3751d85: Update Callback/DynamicBlock.php, add ‘setCaption’ method

### Improvements
- Update README.md, Improve documents

<!-- v1.0.0 -->
## v1.0.0
Initial release

Send any message block, like text, gallery, list and others. Attach buttons with custom payloads to continue interaction.

Trigger actions in ManyChat, like tagging a user, setting a Custom Field or notifying an admin.

<!-- README -->
# README
Release template:

```md
# v1.x.x

### Fixes
-

### New
-

### Improvements
-
```
