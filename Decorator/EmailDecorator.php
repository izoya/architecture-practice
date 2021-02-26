<?php

namespace Decorator;

class EmailDecorator extends Decorator
{
  public function send()
  {
    echo "► Email message: " . PHP_EOL;
    echo $this->text . PHP_EOL;
    $this->content->send();
  }
}
