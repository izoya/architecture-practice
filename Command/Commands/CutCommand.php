<?php


namespace Command\Commands;


use Command\Services\Cursor;

class CutCommand extends Command
{
  private string $removedFragment;

  public function execute(): void
  {
    $start = $this->cursorPosition[Cursor::START];
    $end = $this->cursorPosition[Cursor::END];

    $fragment = $this->getFragment($start, $end);

    $this->buffer->setContent($fragment);
    $this->removedFragment = $fragment;

    $this->file->content = $this->remove($start, $end);

    echo "Cut \"$fragment\"." . PHP_EOL;
  }

  public function undo(): void
  {
    $this->file->content = substr_replace(
      $this->file->content,
      $this->removedFragment,
      $this->cursorPosition[Cursor::START],
      0);
  }

  public function isRevocable(): bool
  {
    return true;
  }

  private function getFragment(int $start, int $end): string
  {
    return substr(
      $this->file->content,
      $this->cursorPosition[Cursor::START],
      $this->cursorPosition[Cursor::END] - $this->cursorPosition[Cursor::START]
    );
  }

  private function remove(int $start, int $end): string
  {
     return substr_replace(
      $this->file->content,
      '',
      $start,
      strlen($this->removedFragment)
    );
  }
}
