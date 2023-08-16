<?php

use Illuminate\Support\Facades\Artisan;

it('can execute dev:list-throwable', function () {
    Artisan::call('dev:list-throwable');
    $output = Artisan::output();
    
    expect($output)->toContain('Throwable');
    expect($output)->toContain('Error');
});
