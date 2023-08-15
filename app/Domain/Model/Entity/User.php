<?php

namespace App\Domain\Model\Entity;

use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Model\ValueObject\User\UserName;

interface User
{
    public function id(): UserId;
    public function userName(): UserName;
}
