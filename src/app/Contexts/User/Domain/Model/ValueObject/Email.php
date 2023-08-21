<?php

namespace App\Contexts\User\Domain\Model\ValueObject;

use App\Contexts\Base\Domain\Model\ValueObject\NonEmptyText;

class Email extends NonEmptyText
{
    protected const PATTERN = "/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/";
}
