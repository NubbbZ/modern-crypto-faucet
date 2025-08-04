<?php

use App\Enums\StatusEnum;
use App\Models\Payout;
use App\Rules\ValidateWalletAddress;
use App\Wallet;
use Livewire\Attributes\{Title};
use Illuminate\Support\Facades\Session;
use Livewire\Volt\Component;

new
#[Title('Faucet')]
class extends Component {
    public $address;

    public function sendCoins(): void
    {
        $this->validate([
            'address' => [
                'required',
                'string',
                'min:34',
                'max:34',
                new ValidateWalletAddress(),
            ],
        ]);

        $address = $this->address;

        $wallet = new Wallet();

        $balance = $wallet->getBalance();
        $amount = random_int(config('faucet.minimum_payout'), config('faucet.maximum_payout'));

        if ($balance < config('faucet.minimum_payout') || $balance < $amount || $amount > $balance) {
            Session::flash('status', 'Insufficient balance to send coins.');
            return;
        }

        $payout = Payout::create([
            'address' => $address,
            'amount' => $amount,
            'status' => StatusEnum::PENDING,
        ]);

        Session::flash('status-success', "$amount ANI will soon be sent to $address");
    }
};

?>

<section class="flex h-full w-full flex-1 items-center justify-center">
    <form class="flex flex-col w-2xl gap-4 rounded-xl bg-white p-4 shadow dark:bg-neutral-800" wire:submit.prevent="sendCoins">
        <flux:input 
            wire:model="address" 
            icon:trailing="wallet" 
            placeholder="Enter your AnimeCoin address..." 
            required
            autofocus
        />

        @error('address')
            <flux:text class="text-center text-sm text-red-600 dark:text-red-400">
                {{ $message }}
            </flux:text>
        @enderror
        
        <flux:text class="text-center text-sm text-gray-500 dark:text-gray-400">
            {{ __('You can claim between :min and :max ANI every :interval hours.', [
                'min' => config('faucet.minimum_payout'),
                'max' => config('faucet.maximum_payout'),
                'interval' => config('faucet.payout_interval'),
            ]) }}
        </flux:text>

        <flux:button variant="primary" color="green" type="submit" class="w-full">{{ __('Claim!') }}</flux:button>
        @if (session('status-success'))
            <flux:text class="text-center font-medium !dark:text-green-400 !text-green-600">
                {{ session('status-success') }}
            </flux:text>
        @endif
        @if (session('status-error'))
            <flux:text class="text-center font-medium !dark:text-red-400 !text-red-600">
                {{ session('status-error') }}
            </flux:text>
        @endif
    </form>
</section>

