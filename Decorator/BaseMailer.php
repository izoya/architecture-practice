<?php
namespace Decorator;

class BaseMailer implements IDecorator
{
  public string $text;

  public function __construct(string $text)
  {
    $this->text = $text;
  }


  public function send()
  {
    echo PHP_EOL . 'Отправка завершена';
  }
}
