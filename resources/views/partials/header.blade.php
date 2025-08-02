<?php

use function Livewire\Volt\{state};

$egg = "egg";

?>

<flux:header class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
    
    <!-- <flux:brand href="{{ route('faucet') }}" name="{{ config('app.name') }}">
        <x-slot name="logo" class="bg-accent text-accent-foreground p-1.5">
            <i class="font-serif font-bold">{{ __('FREE COINS!') }}</i>
        </x-slot>
    </flux:brand> -->
    
    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:navbar.item :href="route('faucet')" :current="request()->routeIs('faucet')" icon="banknotes" wire:navigate>
            {{ __('Faucet') }}
        </flux:navbar.item>
    </flux:navbar>

    <flux:spacer />

    <flux:navbar class="max-lg:hidden">
        <flux:tooltip content="Faucet balance!">
            <flux:badge variant="" icon="wallet" color="green">Balance: 999999 ANI</flux:badge>
        </flux:tooltip>
        <flux:tooltip content="Pending payouts!">
            <flux:badge variant="" icon="clock" color="yellow">Pending: {{ $egg }}</flux:badge>
        </flux:tooltip>
        <flux:tooltip content="Total paid out!">
            <flux:badge variant="" icon="banknotes" color="red">Payout: 999999 ANI</flux:badge>
        </flux:tooltip>
    </flux:navbar>
</flux:header>

<!-- Mobile Menu -->
<flux:sidebar stashable sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

    <!-- <flux:brand href="{{ route('faucet') }}" name="{{ config('app.name') }}">
        <x-slot name="logo" class="bg-accent text-accent-foreground p-1.5">
            <i class="font-serif font-bold">{{ __('FREE COINS!') }}</i>
        </x-slot>
    </flux:brand> -->

    <flux:navlist variant="outline">
        <flux:navlist.item :href="route('faucet')" :current="request()->routeIs('faucet')" icon="banknotes" wire:navigate>
        {{ __('Faucet') }}
        </flux:navlist.item>
    </flux:navlist>

    <flux:spacer />

    <flux:navlist variant="outline">
        <flux:tooltip content="Faucet balance!">
            <flux:badge variant="" icon="wallet" color="green">Balance: 999999 ANI</flux:badge>
        </flux:tooltip>

        <flux:tooltip content="Pending payouts!">
            <flux:badge variant="" icon="clock" color="yellow">Pending: 1</flux:badge>
        </flux:tooltip>

        <flux:tooltip content="Total paid out!">
            <flux:badge variant="" icon="banknotes" color="red">Payout: 999999 ANI</flux:badge>
        </flux:tooltip>
    </flux:navlist>
</flux:sidebar>
