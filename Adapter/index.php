<?php
include dirname(__DIR__) . '/Autoloader/Autoloader.php';
spl_autoload_register([(new Autoloader()), 'loadClass']);

use Adapter\CircleAreaLibAdapter;
use Adapter\SquareAreaLibAdapter;
use Adapter\vendor\CircleAreaLib;
use Adapter\vendor\SquareAreaLib;

function testCircleAdapter(float $circumference): float
{
  $circleAdapter = new CircleAreaLibAdapter(new CircleAreaLib());
  return $circleAdapter->circleArea($circumference);
}

function testSquareAdapter(float $sideSquare): float
{
  $squareAdapter = new SquareAreaLibAdapter(new SquareAreaLib());
  return $squareAdapter->squareArea($sideSquare);
}

$testNumber = 9;

echo testCircleAdapter($testNumber) . PHP_EOL;
echo testSquareAdapter($testNumber) . PHP_EOL;
