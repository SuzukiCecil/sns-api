<?php

namespace App\Contexts\User\Domain\Model\ValueObject;

use App\Contexts\Base\Domain\Model\ValueObject\NonEmptyText;

class UserName extends NonEmptyText
{
    protected const MIN_LENGTH = 3;
    protected const MAX_LENGTH = 20;
}
