<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('example', function () {
    $this->info('This command does something.');
})->describe('Description of what the command does');

