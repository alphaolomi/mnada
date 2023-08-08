<?php

use App\Livewire\Counter;

use function Pest\Livewire\livewire;

it('starts counter at 1', function () {
    $counter = livewire(Counter::class);

    expect($counter->count)->toBe(1);
});
 

it('can be incremented', function () {
    // Arrange
    $counter = livewire(Counter::class);
    
    // Act
    $counter->call('increment');

    // Assert
    expect($counter->count)->toBe(2);
    $counter->assertSee(2);
});
 
it('can be decremented', function () {
    // Arrange
    $counter = livewire(Counter::class);
    
    // Act
    $counter->call('decrement');

    // Assert
    expect($counter->count)->toBe(0);
    $counter->assertSee(0);
});