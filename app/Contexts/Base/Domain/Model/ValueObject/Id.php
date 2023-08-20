<?php

namespace App\Contexts\Base\Domain\Model\ValueObject;

use App\Contexts\Base\Domain\Exception\ViolateDomainRuleException;

abstract class Id
{
    public function __construct(private readonly string $value)
    {
        if (empty($this->value)) {
            throw new ViolateDomainRuleException(static::class . " does`t take empty value.");
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Id $target): bool
    {
        return static::class === $target::class && $this->value() === $target->value();
    }
}
