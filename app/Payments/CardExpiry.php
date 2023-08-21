<?php

namespace App\Payments;

/**
 * Represents the expiry date of a payment card.
 */
readonly class CardExpiry
{
    public function __construct(
        public string $month,
        public string $year,
    ) {
    }

    public static function make(array $data): self
    {
        self::validateInput($data);

        return new self(
            $data['month'],
            $data['year'],
        );
    }

    public function __toString(): string
    {
        return $this->month . '/' . $this->year;
    }

    private static function validateInput(array $data): void
    {
        $validMonths = range(1, 12);
        $currentYear = date('Y');
        $inputYear = intval($data['year']);
        $inputMonth = intval($data['month']);

        if (
            !isset($data['month'], $data['year']) ||
            !in_array($inputMonth, $validMonths) ||
            $inputYear < $currentYear ||
            ($inputYear === $currentYear && $inputMonth < date('n'))
        ) {
            throw new \InvalidArgumentException('Invalid card expiry data.');
        }
    }
}
