<?php

namespace App\Contexts\User\Domain\Service\Repository\Query;

use App\Contexts\User\Domain\Model\Entity\User;
use App\Contexts\User\Domain\Model\ValueObject\Email;
use App\Contexts\User\Domain\Model\ValueObject\UserId;

interface UserQuery
{
    public function getByUserIdAndEmail(UserId $userId, Email $email): User;
}
