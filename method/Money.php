<?php

require_once 'Currency.php';

class Money
{
    private $amount;
    private $currency;

    public function __construct($amount, Currency $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    private function setAmount($amount)
    {
        $this->amount = (int) $amount;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    private function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
    }

    public function equals(Money $money)
    {
        if ($this->amount == $money->getAmount() && $this->currency->getIsoCode() == $money->currency->getIsoCode()){
            return true;
        }

        return false;
    }


}

$usd = new Currency('USD');
$uah = new Currency('UAH');
$money1 = new Money(100, $usd);
$money2 = new Money(100, $uah);

var_dump( $money1->equals($money2));

//echo '<pre>';
//var_dump($money1);
//echo '</pre>';