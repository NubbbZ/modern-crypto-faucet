<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*Route::get('/', function () {
    return view('homepage');
})->name('homepage');*/

Volt::route('/', 'faucet')->name('faucet');
