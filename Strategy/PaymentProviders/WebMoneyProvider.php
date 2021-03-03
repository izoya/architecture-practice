<?php


namespace Strategy\PaymentProviders;


class WebMoneyProvider extends PaymentProvider
{
  protected string $providerName = 'WebMoney';

  public function pay(): bool
  {
    echo $this->providerName . " --- Oops, Payment process went wrong... ( " .
      $this->getPhone() . ", " .
      $this->getAmount() . ") ---" . PHP_EOL;

    return false;
  }

}
