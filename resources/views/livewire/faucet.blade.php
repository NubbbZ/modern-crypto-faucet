<?php

use Livewire\Attributes\{Title};
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new
#[Title('Faucet')]
class extends Component {
    public $address;

    public function sendCoins(): void
    {
        // Logic to send coins to the provided address
        Session::flash('status', 'egg');
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
        <flux:button variant="primary" color="green" type="submit" class="w-full">{{ __('Claim!') }}</flux:button>
        @if (session('status'))
            <flux:text class="text-center font-medium !dark:text-red-400 !text-red-600">
                {{ __('Successfully sent coins to your address!') }}
            </flux:text>
        @endif
    </form>
</section>
