<?php

namespace App;

use Illuminate\Support\Facades\Http;
use Sajya\Client\Client;

class Wallet
{
    private $client;

    public function __construct()
    {
        $host = config('wallet.host');
        $username = config('wallet.username');
        $password = config('wallet.password');

        $url = Http::baseUrl('http://' . $username . ':' . $password . '@' . $host);
        $this->client = new Client($url); //https://user:pass@127.0.0.1:8332
    }

    public function getBalance()
    {
        $response = $this->client->execute('getbalance');
        return $response->result();
    }
}

