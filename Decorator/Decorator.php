<?php

namespace Decorator;

abstract class Decorator implements IDecorator
{
  protected IDecorator $content;
  protected string $text;

  public function __construct(IDecorator $content)
  {
    $this->content = $content;
    $this->text = $content->text;
  }

}
