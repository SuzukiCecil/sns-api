<?php

namespace App\Domain\Model\ValueObject\User;

use App\Domain\Model\ValueObject\NonEmptyString;

class Email extends NonEmptyString
{
    protected const PATTERN = "/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/";
}
