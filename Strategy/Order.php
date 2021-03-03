<?php


namespace Strategy;


use Strategy\PaymentProviders\PaymentProvider;

class Order
{
  private string $phone;
  private float $amount;

  public function __construct(string $phone, float $amount)
  {
    $this->phone = $phone;
    $this->amount = $amount;
  }

  public function pay(PaymentProvider $provider)
  {
    $provider->setPaymentData($this->phone, $this->amount);
    $result = $provider->pay();

    if ($result === false) {
      echo "Error occurred." . PHP_EOL;
      return;
    }

    $this->confirm($provider->getProviderName());

  }

  private function confirm(string $providerName)
  {
    echo "Payment successful!" . PHP_EOL;
    echo "Details: " . PHP_EOL .
    "Provider: $providerName " . PHP_EOL .
    "Phone: $this->phone " . PHP_EOL .
    "Amount: $this->amount " . PHP_EOL . PHP_EOL;
  }


}
