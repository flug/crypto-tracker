<?php
declare(strict_types=1);

namespace Clooder\Client;

use Symfony\Component\HttpClient\NativeHttpClient;

class Nomics
{
    private const BASE_API = 'https://api.nomics.com/v1/';
    private string $apiKey;
    private $client;
    
    public function __construct(string $apiKey, NativeHttpClient $client)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
    }
    
    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @todo change name of method
     */
    public function getPrices(): array
    {
        $query = 'key=demo-26240835858194712a4f8cc0dc635c7a&ids=BTC,ETH&interval=1d,30d&convert=EUR';
        $response = $this->client->request('GET', self::BASE_API . 'currencies/ticker?' . $query);
        
        return $response->toArray();
    }
}
