<?php


namespace Command\Commands;


use Command\Services\Cursor;

class PasteCommand extends Command
{
  private string $insertedText;

  public function execute(): void
  {
    if (!strlen($this->buffer->getContent())) return;
    $this->insertedText = $this->buffer->getContent();

    $this->file->content = substr_replace(
      $this->file->content,
      $this->insertedText,
      $this->cursorPosition[Cursor::START],
      0
    );

    echo "Paste \"$this->insertedText\"." . PHP_EOL;
  }

  public function undo(): void
  {
    $this->file->content = substr_replace(
      $this->file->content,
      '',
      $this->cursorPosition[Cursor::START],
      strlen($this->insertedText)
    );
  }

  public function isRevocable(): bool
  {
    return true;
  }
}
