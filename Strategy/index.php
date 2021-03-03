<?php

/*
 * Стратегия: есть интернет-магазин по продаже носков.
 * Необходимо реализовать возможность оплаты различными способами (Qiwi, Яндекс, WebMoney).
 * Разница лишь в обработке запроса на оплату и получение ответа от платёжной системы.
 * В интерфейсе функции оплаты достаточно общей суммы товара и номера телефона.
 */


include dirname(__DIR__) . '/Autoloader/Autoloader.php';
spl_autoload_register([(new Autoloader()), 'loadClass']);

use Strategy\Order;
use Strategy\PaymentProviders\PaymentProvider;
use Strategy\PaymentProviders\QiwiProvider;
use Strategy\PaymentProviders\WebMoneyProvider;
use Strategy\PaymentProviders\YandexMoneyProvider;


function testStrategy(PaymentProvider $provider, array $paymentData): void
{
  $order = new Order($paymentData['phone'], $paymentData['amount']);
  $order->pay($provider);
}


$paymentData = [
  'phone' => '79993241701',
  'amount' => 1499,99,
];
testStrategy(new QiwiProvider(), $paymentData);
testStrategy(new YandexMoneyProvider(), $paymentData);
testStrategy(new WebMoneyProvider(), $paymentData);
