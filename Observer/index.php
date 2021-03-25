<?php

/*
 * Наблюдатель: есть сайт HandHunter.gb.
 * На нем работники могут подыскать себе вакансию РНР-программиста.
 * Необходимо реализовать классы искателей с их именем, почтой и стажем работы.
 * Также реализовать возможность в любой момент встать на биржу вакансий
 * (подписаться на уведомления), либо же, напротив, выйти из гонки за местом.
 * Таким образом, как только появится новая вакансия программиста, все жаждущие автоматически
 * получат уведомления на почту (можно реализовать условно).
 */


include dirname(__DIR__) . '/Autoloader/Autoloader.php';
spl_autoload_register([(new Autoloader()), 'loadClass']);

use Observer\Candidate;
use Observer\Models\User;
use Observer\VacancyList;


function testObserver(): void
{
  $vacancyList = VacancyList::getInstance();
  $userModel = new User();

  $user1 = new Candidate($userModel->find(1));
  $user2 = new Candidate($userModel->find(2));
  $user1->subscribe();
  $user2->subscribe();


  $vacancyList->add('Backend developer');

  $user2->unsubscribe();

  $vacancyList->add('Frontend developer');
}

testObserver();
