<?php
namespace Singleton;

trait Singleton
{
  private static mixed $instance;

  private function __construct() {}
  private function __clone(): void {}

  public static function getInstance(): static
  {
    return self::$instance ?? self::$instance = new static;
  }

}
