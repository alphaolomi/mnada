<?php

namespace App\Payments;

readonly class CardExpiry
{
    public function __construct(
        public string $month,
        public string $year,
    ) {
    }

    public static function make(array $data): self
    {        
        return new self(
            $data['month'],
            $data['year'],
        );
    }

    public function __toString(): string
    {
        return $this->month . '/' . $this->year;
    }
}
