<?php


namespace Observer;


class Candidate implements IObserver
{
  private array $user;

  public function __construct(array $user)
  {
    $this->user = $user;
  }


  public function subscribe()
  {
    VacancyList::getInstance()->attachObserver($this);
  }


  public function unsubscribe()
  {
    VacancyList::getInstance()->detachObserver($this);
    echo "Candidate " . $this->getName() . " was unsubscribed." . PHP_EOL;

  }


  public function handle(string $notification)
  {
    echo "New vacancy for " . $this->getName() . ": $notification" . PHP_EOL;
  }

  public function getName()
  {
    return $this->user['name'];
  }
}
