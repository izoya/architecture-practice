<?php


namespace Command\Services;


class Cursor
{
  const START = 'start';
  const END = 'end';
  private int $start = 0;
  private int $end = 0;

  public function move(int $position): void
  {
    $this->start = $position;
    $this->end = $position;
  }

  public function select(int $start, int $end): void
  {
    $this->start = $start;
    $this->end = $end;
  }

  public function getStart(): int
  {
    return $this->start;
  }

  public function getEnd(): int
  {
    return $this->end;
  }

}
