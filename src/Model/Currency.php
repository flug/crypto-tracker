<?php
declare(strict_types=1);

namespace Clooder\Model;

/**
 * Class Currency
 * @package Clooder\Model
 *
 * id    "BTC"
 * currency    "BTC"
 * symbol    "BTC"
 * name    "Bitcoin"
 * logo_url    "https://s3.us-east-2.amazonaws.com/nomics-api/static/images/currencies/btc.svg"
 * rank    "1"
 * price    "6554.30489825"
 * price_date    "2020-04-22T00:00:00Z"
 * price_timestamp    "2020-04-22T20:36:00Z"
 * market_cap    "120205624119"
 * circulating_supply    "18339950"
 * max_supply    "21000000"
 */
class Currency
{
    private string $currency;
    private string $name;
    private string $price;
    
    public function __construct(string $currency, string $name, string $price)
    {
        $this->currency = $currency;
        $this->name = $name;
        $this->price = $price;
    }
    
    public static function fromArray(array $data): self
    {
        return new self ($data['currency'], $data['name'], $data['price']);
    }
    
    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }
}
