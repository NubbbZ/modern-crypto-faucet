<?php

namespace App;

use Illuminate\Support\Facades\Http;
use Sajya\Client\Client;

class Wallet
{
    private $client;

    public function __construct()
    {
        $host = config('faucet.wallet.host');
        $username = config('faucet.wallet.username');
        $password = config('faucet.wallet.password');

        $url = Http::baseUrl('http://' . $username . ':' . $password . '@' . $host);
        $this->client = new Client($url); //https://user:pass@127.0.0.1:8332
    }

    public function validateAddress($address): bool
    {
        $response = $this->client->execute('validateaddress', [$address]);
        if (isset($response->result()['isvalid']) && $response->result()['isvalid']) {
            return true;
        }
        return false;
    }

    public function getBalance()
    {
        $response = $this->client->execute('getbalance');
        if ($response->result() == null) return 0;
        return $response->result();
    }

    public function sendToAddress($address, $amount)
    {
        $response = $this->client->execute('sendtoaddress', [$address, $amount]);
        //return $response->result();
    }
}

