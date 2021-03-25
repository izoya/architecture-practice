<?php


namespace Observer;


use Singleton\Singleton;

trait Subject
{
  use Singleton;

  private array $observers = [];

  public function attachObserver(IObserver $observer)
  {
    $this->observers[] = $observer;
  }

  public function detachObserver(IObserver $observer)
  {
    foreach ($this->observers as $key => $item) {

      if ($item === $observer) {
        unset($this->observers[$key]);
      }
    }
  }

  public function notifyObservers(string $notification)
  {
    foreach ($this->observers as $observer) {
      $observer->handle($notification);
    }
  }

}
