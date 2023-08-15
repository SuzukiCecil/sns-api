<?php

namespace App\Domain\Model\ValueObject\User;

use App\Domain\Model\ValueObject\NonEmptyString;

class UserName extends NonEmptyString
{
    protected const MIN_LENGTH = 3;
    protected const MAX_LENGTH = 20;
}
