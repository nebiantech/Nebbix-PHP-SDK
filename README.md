# telegram-core-api
Telegram mini library for telegram api.

This is how to use the telegram bot api.

<h3>First of all, i'll instantiate the telegram class like this.</h3>

```
  $token = "The bot token you got from telegram";
  $tg = new Telegram($token);
  
  // To send message 
  
  $chat_id = "The receiver chat id";
  
  $text = "The message you want to send.";
  ```
  Read markdown <a href="https://core.telegram.org/bots/api#markdown-style">here</a>
  
  <h3>Markdown style</h3>
  
  To use this mode, pass Markdown in the parse_mode field when using sendMessage. Use the following syntax in your message:

  *bold text*
  _italic text_
  [inline URL](http://www.example.com/)
  [inline mention of a user](tg://user?id=123456789)
  `inline fixed-width code`
  ```block_language
  pre-formatted fixed-width code block
  ```
  HTML style
  To use this mode, pass HTML in the parse_mode field when using sendMessage. The following tags are currently supported:
```
  <b>bold</b>, <strong>bold</strong>
  <i>italic</i>, <em>italic</em>
  <a href="http://www.example.com/">inline URL</a>
  <a href="tg://user?id=123456789">inline mention of a user</a>
  <code>inline fixed-width code</code>
  <pre>pre-formatted fixed-width code block</pre>
  
  $parse_mode = NULL or 'Markdown';
  
  print_r($tg->sendMessage($chat_id, $text, $parse_mode));

```
``Hello``
