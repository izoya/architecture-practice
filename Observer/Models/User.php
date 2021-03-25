<?php


namespace Observer\Models;


class User
{
  private array $users = [
    1 => [
      'name' => 'John',
      'email' => 'johndoe@mail.com',
      'experience' => 10,
    ],
    2 => [
      'name' => 'James',
      'email' => 'james@mail.com',
      'experience' => 2,
    ],
    3 => [
      'name' => 'Judy',
      'email' => 'judyrou@mail.com',
      'experience' => 1,
    ],
  ];

  public function find(int $id)
  {
    return $this->users[$id];
  }
}
