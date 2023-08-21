<?php

use App\Payments\Card;
use App\Payments\Cards;
use App\Payments\CardType;
use App\Payments\CardExpiry;

it('can add and retrieve cards', function () {
    $cards = new Cards();
    $card1 = new Card('card_id1', CardType::Visa, '1111', new CardExpiry('12', '2025'));
    $card2 = new Card('card_id2', CardType::MasterCard, '2222', new CardExpiry('06', '2024'));

    $cards[] = $card1;
    $cards[] = $card2;

    expect($cards[0])->toBe($card1)
        ->and($cards[1])->toBe($card2);
});

it('throws an exception for non-Card offsetSet', function () {
    $cards = new Cards();
    expect(function () use ($cards) {
        $cards[] = 'invalid_card';
    })->toThrow(InvalidArgumentException::class);
});
