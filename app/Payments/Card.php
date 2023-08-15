<?php

namespace App\Payments;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

readonly class Card implements Jsonable, Arrayable
{
    public function __construct(
        public string $id,
        public CardType $type,
        public string $lastFour,
        public CardExpiry $expiry,
    ) {
    }


    /** @inheritDoc */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /** @inheritDoc */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'type' => $this->type->value,
            'last_four' => $this->lastFour,
            'expiry' => (string)$this->expiry,
        ];
    }
}
