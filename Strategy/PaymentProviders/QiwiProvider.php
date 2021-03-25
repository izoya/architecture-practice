<?php


namespace Strategy\PaymentProviders;


class QiwiProvider extends PaymentProvider
{
  protected string $providerName = 'QIWI';

  public function pay(): bool
  {
    echo $this->providerName . " --- Payment process... ( ".
      $this->getPhone() . ", " .
      $this->getAmount() . ") ---" . PHP_EOL;

    return true;

  }

}
