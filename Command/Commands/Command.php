<?php


namespace Command\Commands;


use Command\File;
use Command\Services\Clipboard;

abstract class Command
{

  protected File $file;
  protected array $cursorPosition;
  protected Clipboard $buffer;

  public function __construct(File $file)
  {
    $this->file = $file;
    $this->cursorPosition = $file->getCursorPosition();
    $this->buffer = Clipboard::getInstance();
  }

  abstract public function execute(): void;
  abstract public function undo(): void;
  abstract public function isRevocable(): bool;

}
