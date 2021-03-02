<?php


namespace Decorator;

class WhatsappDecorator extends Decorator
{
  private int $messageLength = 35;

  public function send()
  {
    echo "► Whatsapp shortened message: " . PHP_EOL;
    echo substr_replace(strip_tags($this->text), '...', $this->messageLength) . 'https://site.com' . PHP_EOL;

    $this->content->send();
  }
}
