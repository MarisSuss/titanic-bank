<?php

namespace App\Models\Collections;

use App\Models\Currency;

class CurrenciesCollection
{
    private array $currencies = [];
    private array $currenciesNames = [];
    private string $date;

    public function __construct()
    {
        $xml = file_get_contents('https://www.bank.lv/vk/ecb.xml');
        $currencyData = simplexml_load_string($xml);

        $this->date = $this->formatDate((string)$currencyData->Date[0]);

        $currencies = json_decode(json_encode ( $currencyData->Currencies ) , true);

        foreach ($currencies['Currency'] as $currency) {
            $this->currencies[$currency['ID']] = (float)$currency['Rate'];
            $this->currenciesNames [] = $currency['ID'];
        }

    }

    public function getExchangeRate(string $from,string $to)
    {
        if ($from === $to) {
            return 1;
        }
        if ($from === 'EUR') {
            return $this->currencies[$to];
        }
        if ($to === 'EUR') {
            return 1 / $this->currencies[$from];
        }

        return $this->currencies[$to] / $this->currencies[$from];
    }

    public function getCurrencyNames(): array
    {
        return $this->currenciesNames;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    private function formatDate(string $unFormattedDate): string // date() formatting function did not work
    {
        $date = substr_replace($unFormattedDate, "-", 4, 0);
        return substr_replace($date, "-", 7, 0);
    }
}
