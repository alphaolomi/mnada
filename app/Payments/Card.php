<?php

namespace App\Payments;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Represents a payment card.
 */
readonly class Card implements Jsonable, Arrayable
{
    public function __construct(
        public string $id,
        public CardType $type,
        public string $lastFour,
        public CardExpiry $expiry,
    ) {
    }

    /**
     * Convert the card object to JSON.
     *
     * @param int $options
     * @return string
     */
    public function toJson($options = 0): string
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Convert the card object to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type->value,
            'last_four' => $this->lastFour,
            'expiry' => (string) $this->expiry,
        ];
    }
}
