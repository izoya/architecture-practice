<?php

namespace Decorator;

class TelegramDecorator extends Decorator
{

  public function send()
  {
    echo "► Telegram plain message: " . PHP_EOL;
    echo strip_tags($this->text) . PHP_EOL;

    $this->content->send();
  }
}
