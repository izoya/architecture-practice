<?php


namespace Strategy\PaymentProviders;


class YandexMoneyProvider extends PaymentProvider
{
  protected string $providerName = 'Yandex.Money';

  public function pay(): bool
  {
    echo $this->providerName . " --- Payment process... ( " .
      $this->getPhone() . ", " .
      $this->getAmount() . ") ---" . PHP_EOL;

    return true;
  }

}
