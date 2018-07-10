<?php
class Currency
{
    private $isoCode;

    public function __construct($anIsoCode)
    {
        $this->setIsoCode($anIsoCode);
    }


    private function setIsoCode($anIsoCode)
    {
        if (!preg_match('/[A-Z]{3}$/', $anIsoCode)){
            throw new \InvalidArgumentException();
        }

        $this->isoCode = $anIsoCode;

    }

    public function getIsoCode()
    {
        return $this->isoCode;
    }
}

$usd = new Currency('USD');
$uah = new Currency('UAH');

//var_dump($uah);