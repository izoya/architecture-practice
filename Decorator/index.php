<?php
include dirname(__DIR__) . '/Autoloader/Autoloader.php';
spl_autoload_register([(new Autoloader()), 'loadClass']);


use Decorator\BaseMailer;

function testDecorator(string $text, array $messengers): void
{
  $mailer = new BaseMailer($text);

  foreach ($messengers as $messenger) {

    $decorator = 'Decorator\\' . ucfirst($messenger) . 'Decorator';

    if (class_exists($decorator)) {
      $mailer = new $decorator($mailer);
    }
  }

  $mailer->send();

}

$messengers = ['whatsapp', 'telegram', 'email'];
$text = 'Some really significant, <b>neatly formatted</b> text here.';
testDecorator($text, $messengers);
