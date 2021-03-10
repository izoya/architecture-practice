<?php


namespace Command\Commands;


use Command\Services\Cursor;

class CopyCommand extends Command
{

  public function execute(): void
  {
    $fragment = substr(
      $this->file->content,
      $this->cursorPosition[Cursor::START],
      $this->cursorPosition[Cursor::END] - $this->cursorPosition[Cursor::START]
    );

    if (strlen($fragment)) {
      $this->buffer->setContent($fragment);
    }

    echo "Copy \"$fragment\"." . PHP_EOL;
  }

  public function undo(): void
  {
    // Irrevocable command.
  }

  public function isRevocable(): bool
  {
    return false;
  }
}
