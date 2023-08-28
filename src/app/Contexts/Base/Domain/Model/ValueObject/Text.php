<?php

namespace App\Contexts\Base\Domain\Model\ValueObject;

use App\Contexts\Base\Domain\Exception\ViolateDomainRuleException;

abstract class Text
{
    protected const PATTERN = null;
    protected const MIN_LENGTH = null;
    protected const MAX_LENGTH = null;

    /**
     * @param string $value
     * @throws ViolateDomainRuleException
     */
    public function __construct(private readonly string $value)
    {
        if (!empty($this->value)) {
            if (!is_null(static::PATTERN) && !preg_match((string)static::PATTERN, $this->value)) {
                throw new ViolateDomainRuleException(
                    static::class . " does`t match pattern."
                );
            }
            if (!is_null(static::MIN_LENGTH) && mb_strlen($this->value) < static::MIN_LENGTH) {
                throw new ViolateDomainRuleException(
                    static::class . " must be over " . (string)static::MIN_LENGTH . " characters"
                );
            }
            if (!is_null(static::MIN_LENGTH) && mb_strlen($this->value) > static::MAX_LENGTH) {
                throw new ViolateDomainRuleException(
                    static::class . " must be under " . (string)static::MAX_LENGTH . " characters"
                );
            }
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
