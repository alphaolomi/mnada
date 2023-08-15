<?php

use App\Payments\Card;
use App\Payments\Cards;
use App\Payments\CardType;
use App\Payments\CardExpiry;


it('can create a card', function () {
    $card = new Card('card_id', CardType::Visa, '1234', new CardExpiry('12', '2025'));

    expect($card->id)->toBe('card_id');
    expect($card->type)->toBe(CardType::Visa);
    expect($card->lastFour)->toBe('1234');
    expect((string)$card->expiry)->toBe('12/2025');
});

it('can convert card to array', function () {
    $card = new Card('card_id', CardType::MasterCard, '5678', new CardExpiry('06', '2024'));

    $expectedArray = [
        'id' => 'card_id',
        'type' => 'mastercard',
        'last_four' => '5678',
        'expiry' => '06/2024',
    ];

    expect($card->toArray())->toBe($expectedArray);
});

it('can convert card to JSON', function () {
    $card = new Card('card_id', CardType::AmericanExpress, '9876', new CardExpiry('09', '2023'));

    $expectedJson = '{"id":"card_id","type":"amex","last_four":"9876","expiry":"09\/2023"}';

    expect($card->toJson())->toBe($expectedJson);
});

it('throws an exception when non-Card is added to Cards', function () {
    $cards = new Cards();
    expect(function () use ($cards) {
        $cards[] = 'invalid_card';
    })->toThrow(InvalidArgumentException::class);
});
