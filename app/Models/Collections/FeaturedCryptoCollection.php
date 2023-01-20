<?php

namespace App\Models\Collections;

use App\Models\CryptoCoin;

class FeaturedCryptoCollection
{
    private array $symbols = [];
    private array $coins = [];

    public function __construct(array $symbols)
    {
        foreach ($symbols as $symbol) {
            $this->coins[] = new CryptoCoin($symbol);
        }
    }

    public function getCoins(): array
    {
        return $this->coins;
    }
}
