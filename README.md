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
  
  print_r($tg->sendMessage());

```
``Hello``
