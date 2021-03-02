<?php
namespace Observer;

interface IObserver
{
  public function handle(string $notification);
}
