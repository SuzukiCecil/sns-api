<?php

namespace App\Domain\Model\ValueObject;

use App\Domain\Model\Exception\InvalidDataException;

abstract class NonEmptyString
{
    protected const PATTERN = null;

    public function __construct(private readonly string $value)
    {
        if (empty($this->value)) {
            throw new InvalidDataException(static::class . " does`t take empty value.");
        }
        if (!is_null(static::PATTERN) && !preg_match(static::PATTERN, $this->value())) {
            throw new InvalidDataException(static::class . " does`t match pattern.");
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
