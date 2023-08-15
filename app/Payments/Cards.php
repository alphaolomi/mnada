<?php

namespace App\Payments;

use ArrayAccess;
use ArrayIterator;
use InvalidArgumentException;
use IteratorAggregate;

/**
 * @implements ArrayAccess<int, Card>
 * @implements IteratorAggregate<int, Card>
 */
class Cards implements ArrayAccess, IteratorAggregate
{

    public function __construct(private array $cards = [])
    {
    }

    /**
     * @return array<int, Card>
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->cards[$offset]);
    }

    /**
     * @return Card|null
     */
    public function offsetGet($offset): ?Card
    {
        return $this->cards[$offset] ?? null;
    }

    /**
     * @param Card $value
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!$value instanceof Card) {
            throw new InvalidArgumentException("Expected parameter 2 to be a Card.");
        }

        $this->cards[$offset] = $value;
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
