<?php

use App\Payments\CardType;

it('can create card types', function () {
    $amex = CardType::AmericanExpress;
    $visa = CardType::Visa;
    $mastercard = CardType::MasterCard;

    expect($amex->value)->toBe('amex');
    expect($visa->value)->toBe('visa');
    expect($mastercard->value)->toBe('mastercard');
});
