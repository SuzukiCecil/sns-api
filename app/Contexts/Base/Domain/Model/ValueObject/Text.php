<?php

namespace App\Contexts\Base\Domain\Model\ValueObject;

use App\Contexts\Base\Domain\Model\Exception\InvalidDataException;

abstract class Text
{
    protected const PATTERN = null;
    protected const MIN_LENGTH = null;
    protected const MAX_LENGTH = null;

    /**
     * @param string $value
     * @throws InvalidDataException
     */
    public function __construct(private readonly string $value)
    {
        if (!empty($this->value)) {
            if (!is_null(static::PATTERN) && !preg_match(static::PATTERN, $this->value())) {
                throw new InvalidDataException(static::class . " does`t match pattern.");
            }
            if (!is_null(static::MIN_LENGTH) && strlen($this->value) < static::MIN_LENGTH) {
                throw new InvalidDataException(static::class . " must be over " . static::MIN_LENGTH . " characters");
            }
            if (!is_null(static::MIN_LENGTH) && strlen($this->value) > static::MAX_LENGTH) {
                throw new InvalidDataException(static::class . " must be under " . static::MAX_LENGTH . " characters");
            }
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
