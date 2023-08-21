<?php

namespace App\Multipliers;

use LevelUp\Experience\Contracts\Multiplier;

class IsMonthDecember implements Multiplier
{
    public bool $enabled = true;

    private int $multiplier = 2;

    public function qualifies(array $data): bool
    {
        return now()->month === 12;
    }

    public function setMultiplier(): int
    {
        return $this->multiplier;
    }
}
