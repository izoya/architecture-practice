<?php


namespace Command\Services;


use Singleton\Singleton;

class Clipboard
{
  use Singleton;

  private string $content;

  public function getContent(): string
  {
    return $this->content;
  }

  public function setContent(string $content)
  {
    // ignore empty strings inserts
    if (strlen($content)) {
      $this->content = $content;
    }
  }

}
