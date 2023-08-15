<?php

namespace App\Domain\Model\ValueObject;

use App\Domain\Model\Exception\InvalidDataException;

abstract class Id
{
    public function __construct(private readonly string $value)
    {
        if (empty($this->value)) {
            throw new InvalidDataException(static::class . " does`t take empty value.");
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
