<?php

use App\Payments\Card;
use App\Payments\CardExpiry;
use App\Payments\CardType;

beforeEach(function () {
    $this->card  = new Card(
        id: "YTZERT37RR3TR7",
        type: CardType::AmericanExpress,
        lastFour: "0826",
        expiry: new CardExpiry(
            month: "04",
            year: "2024",
        ),
    );
});

it('can instantiate a card', function () {
    expect($this->card)->toBeInstanceOf(Card::class);
});
