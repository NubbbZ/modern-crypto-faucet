<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Wallet;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    protected $fillable = [
        'address',
        'amount',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    public function processPayouts()
    {
        $wallet = new Wallet();
        $payouts = Payout::where('status', StatusEnum::PENDING)->get();
        foreach ($payouts as $payout) {
            if (!$wallet->validateAddress($payout->address)) {
                $payout->status = StatusEnum::FAILED;
                $payout->save();
                continue;
            }
            
            $balance = $wallet->getBalance();
            if ($balance < $payout->amount) {
                $payout->status = StatusEnum::FAILED;
                $payout->save();
                continue;
            }

            try {
                $wallet->sendToAddress($payout->address, $payout->amount);
            } catch (\Exception $e) {
                // Log the error or handle it as needed
                $payout->status = StatusEnum::FAILED;
                $payout->save();
                continue;
            }

            // Update payout status to completed
            $payout->status = StatusEnum::COMPLETED;
            $payout->save();
        }
    }
}
