<?php


namespace Observer;


class VacancyList
{
  use Subject;
  private array $vacancies = [];

  public function add(string $vacancyText): void
  {
    $this->vacancies[] = $vacancyText;
    $this->notifyObservers($vacancyText);
  }

  public function getVacancies()
  {
    return$this->vacancies;
  }
}
