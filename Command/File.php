<?php


namespace Command;


use Command\Services\Cursor;

class File
{
  public string $content;
  private string $filename;
  private Cursor $cursor;

  public function __construct(string $filename, string $text)
  {
    $this->content = $text;
    $this->filename = $filename;
    $this->cursor = new Cursor();
    echo 'File opened.' . PHP_EOL;
  }

  public function getFilename(): string
  {
    return $this->filename;
  }

  public function getCursorPosition(): array
  {
    return [
      'start' => $this->cursor->getStart(),
      'end' => $this->cursor->getEnd()
    ];
  }

  public function moveCursor(int $position): void
  {
    $this->cursor->move($this->clarifyCursorPosition($position));
  }

  public function selectFragment(int $start, int $end): void
  {
    $this->cursor->select(
      $this->clarifyCursorPosition($start),
      $this->clarifyCursorPosition($end)
    );
  }

  private function clarifyCursorPosition($position): int
  {
    $fileLength = strlen($this->content);

    return ($position > $fileLength) ? $fileLength : $position;
  }

}
