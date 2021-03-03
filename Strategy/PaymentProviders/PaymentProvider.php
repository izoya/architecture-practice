<?php


namespace Strategy\PaymentProviders;


abstract class PaymentProvider
{
  private string $phone;
  private float $amount;
  protected string $providerName;

  public function setPaymentData(string $phone, float $amount)
  {
    $this->phone = $phone;
    $this->amount = $amount;
  }

  public function getProviderName(): string
  {
      return $this->providerName;
  }

  protected function getPhone(): string
  {
    return $this->phone;
  }

  protected function getAmount(): float
  {
    return $this->amount;
  }

  abstract public function pay(): bool;

}
