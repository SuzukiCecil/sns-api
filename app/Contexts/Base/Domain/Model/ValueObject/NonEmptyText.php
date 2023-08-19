<?php

namespace App\Contexts\Base\Domain\Model\ValueObject;

use App\Contexts\Base\Domain\Model\Exception\InvalidDataException;

abstract class NonEmptyText extends Text
{
    /**
     * @param string $value
     * @throws InvalidDataException
     */
    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new InvalidDataException(static::class . " does`t take empty value.");
        }
        parent::__construct($value);
    }
}
