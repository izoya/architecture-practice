<?php

namespace Adapter;

use Adapter\vendor\CircleAreaLib;

class CircleAreaLibAdapter implements ICircle
{
  private CircleAreaLib $circleAreaLib;

  public function __construct(CircleAreaLib $circleAreaLib)
  {
    $this->circleAreaLib = $circleAreaLib;
  }

  function circleArea(float $circumference): float
  {
    $diagonal = sqrt($circumference ** 2) / M_PI;

    return $this->circleAreaLib->getCircleArea($diagonal);
  }

}
