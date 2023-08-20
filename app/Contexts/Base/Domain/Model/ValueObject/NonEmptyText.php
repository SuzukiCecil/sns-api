<?php

namespace App\Contexts\Base\Domain\Model\ValueObject;

use App\Contexts\Base\Domain\Exception\ViolateDomainRuleException;

abstract class NonEmptyText extends Text
{
    /**
     * @param string $value
     * @throws ViolateDomainRuleException
     */
    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new ViolateDomainRuleException(static::class . " does`t take empty value.");
        }
        parent::__construct($value);
    }
}
