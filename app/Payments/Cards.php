<?php

namespace App\Payments;

use ArrayAccess;
use ArrayIterator;
use InvalidArgumentException;
use IteratorAggregate;

/**
 * Represents a collection of payment cards.
 *
 * @implements ArrayAccess<int, Card>
 * @implements IteratorAggregate<int, Card>
 */
class Cards implements ArrayAccess, IteratorAggregate
{
    /**
     * @var array<int, Card>
     */
    private array $cards = [];

    public function __construct(array $cards = [])
    {
        foreach ($cards as $card) {
            $this->offsetSet(null, $card);
        }
    }

    /**
     * @param int $offset
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->cards[$offset]);
    }

    /**
     * @param $offset
     * @return Card|null
     */
    public function offsetGet($offset): ?Card
    {
        return $this->cards[$offset] ?? null;
    }

    /**
     * @param mixed $offset
     * @param Card $value
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!$value instanceof Card) {
            throw new InvalidArgumentException("Expected parameter 2 to be a Card.");
        }

        if ($offset === null) {
            $this->cards[] = $value;
        } else {
            $this->cards[$offset] = $value;
        }
    }

    /**
     * @param int $offset
     */
    public function offsetUnset($offset): void
    {
        if (isset($this->cards[$offset])) {
            unset($this->cards[$offset]);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->cards);
    }
}
