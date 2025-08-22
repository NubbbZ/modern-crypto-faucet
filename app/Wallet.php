<?php

namespace App;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

        $this->testConnection();
    }

    public function validateAddress($address): bool
    {
        $this->testConnection();

        try {
            $response = $this->client->execute('validateaddress', [$address]);
            if (isset($response->result()['isvalid']) && $response->result()['isvalid']) {
                return true;
            }
            return false;
        } catch (\Exception $e) {
            Log::error('Error validating address!', ['message' => $e->getMessage()]);
            return false;
        }
    }

    public function getBalance(): ?int
    {
        $this->testConnection();

        try {
            return $this->client->execute('getbalance')->result();
        } catch (\Exception $e) {
            Log::error('Error fetching balance!', ['message' => $e->getMessage()]);
            return null;
        }
    }

    public function sendToAddress($address, $amount)
    {
        $this->testConnection();

        try {
            $response = $this->client->execute('sendtoaddress', [$address, $amount]);
            return $response->result();
        } catch (\Exception $e) {
            Log::error('Error sending to address!', ['message' => $e->getMessage()]);
            return null;
        }
    }

    private function testConnection()
    {
        try {
            $this->client->execute('getblockchaininfo');
        } catch (\Exception $e) {
            Log::error('Wallet connection error!', ['message' => $e->getMessage()]);
            abort(503, 'Wallet connection error!');
        }
    }
}

