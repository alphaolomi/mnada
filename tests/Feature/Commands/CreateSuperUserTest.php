<?php

use Illuminate\Support\Facades\Artisan;

it('lists throwable classes', function () {
    Artisan::call('dev:list-throwable-classes-command');

    // Your assertions here based on the expected behavior of ListThrowableClassesCommand.
    // For example, you might want to check if certain classes are listed.
    // You can also assert the output or any other effects of running the command.
    
    // For instance:
    $output = Artisan::output();
    // expect($output)->toContain('SomeThrowableClass');
    // expect($output)->toContain('AnotherThrowableClass');
    
    // You can add more assertions as needed.
});


it('can execute dev:list-throwable', function () {
    Artisan::call('dev:list-throwable');
    $output = Artisan::output();
    
    expect($output)->toContain('Throwable');
    expect($output)->toContain('Error');
});
