<?php

namespace Adapter;

use Adapter\vendor\SquareAreaLib;

class SquareAreaLibAdapter implements ISquare
{
  private SquareAreaLib $squareAreaLib;

  public function __construct(SquareAreaLib $squareAreaLib)
  {
    $this->squareAreaLib = $squareAreaLib;
  }

  function squareArea(float $sideSquare): float
  {
    $diagonal = sqrt(2 * ($sideSquare ** 2));

    return $this->squareAreaLib->getSquareArea($diagonal);
  }
}
