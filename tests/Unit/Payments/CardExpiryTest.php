<?php

use App\Payments\CardExpiry;

it('can create card expiry', function () {
    $cardExpiry = new CardExpiry('12', '2025');

    expect($cardExpiry->month)->toBe('12')
        ->and($cardExpiry->year)->toBe('2025');
});

it('can create card expiry using make method', function () {
    $cardExpiry = CardExpiry::make(['month' => '12', 'year' => '2025']);

    expect($cardExpiry->month)->toBe('12')
        ->and($cardExpiry->year)->toBe('2025');
});

it('can convert card expiry to string', function () {
    $cardExpiry = new CardExpiry('12', '2025');

    expect((string)$cardExpiry)->toBe('12/2025');
});

it('throws an exception for invalid card expiry data', function () {
    expect(static function () {
        CardExpiry::make(['month' => '13', 'year' => '2025']);
    })->toThrow(InvalidArgumentException::class);
});
