<?php

use App\Enums\StatusEnum;
use App\Models\Payout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $payout = new Payout();
    $payout->processPayouts();
})->everyMinute()->name('payouts')->withoutOverlapping()
    ->description('Process pending payouts every minute')
    ->when(function () {
        return DB::table('payouts')->where('status', StatusEnum::PENDING)->exists();
    });

//->cron('*/' . config('payout_frequency') . ' * * * *');
