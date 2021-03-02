<?php

class Autoloader
{
  public function loadClass($className)
  {
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR .str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

    if (is_file($file)) {
      include $file;
    }
  }
}
