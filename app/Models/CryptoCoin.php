<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoCoin extends Model
{
    use HasFactory;
    protected string $symbol;
    protected Client $client;
    protected object $data;
    protected string $name;
    protected float $price;
    protected float $percentChange1h;
    protected float $percentChange24h;
    protected float $percentChange7d;
    protected string $logoUrl;

    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
        $this->client = new Client([
            'base_uri' => 'https://pro-api.coinmarketcap.com/v1/',
            'headers' => [
                'X-CMC_PRO_API_KEY' => env('COIN_MARKET_CAP_API_KEY')
            ]
        ]);
        $this->data = $this->getCoinData()->data->{$symbol};
        $this->name = $this->data->name;
        $this->price = $this->data->quote->USD->price;
        $this->percentChange1h = $this->data->quote->USD->percent_change_1h;
        $this->percentChange24h = $this->data->quote->USD->percent_change_24h;
        $this->percentChange7d = $this->data->quote->USD->percent_change_7d;
        $this->logoUrl = "https://s2.coinmarketcap.com/static/img/coins/64x64/{$this->data->id}.png";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getPercentChange1h(): float
    {
        return $this->percentChange1h;
    }

    public function getPercentChange24h(): float
    {
        return $this->percentChange24h;
    }

    public function getPercentChange7d(): float
    {
        return $this->percentChange7d;
    }

    public function getLogoUrl(): string
    {
        return $this->logoUrl;
    }

    public function getPriceFormatted(): string
    {
        return number_format($this->price, 2, '.', ',');
    }

    public function getPercentChange1hFormatted(): string
    {
        return number_format($this->percentChange1h, 2, '.', ',');
    }

    public function getPercentChange24hFormatted(): string
    {
        return number_format($this->percentChange24h, 2, '.', ',');
    }

    public function getPercentChange7dFormatted(): string
    {
        return number_format($this->percentChange7d, 2, '.', ',');
    }
    protected function getCoinData(): object
    {
        $response = $this->client->get("cryptocurrency/quotes/latest?symbol={$this->symbol}");
        return json_decode($response->getBody()->getContents());
    }
}
