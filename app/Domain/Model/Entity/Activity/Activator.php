<?php

namespace App\Domain\Model\Entity\Activity;

use App\Domain\Model\Entity\User;
use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Model\ValueObject\User\UserName;

class Activator implements User
{
    public function __construct(
        private readonly UserId $id,
        private readonly UserName $userName,
    ) {
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function userName(): UserName
    {
        return $this->userName;
    }
}
