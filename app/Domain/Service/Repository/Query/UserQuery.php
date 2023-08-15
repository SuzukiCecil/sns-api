<?php

namespace App\Domain\Service\Repository\Query;

use App\Domain\Model\Entity\User\User;
use App\Domain\Model\ValueObject\User\UserId;

interface UserQuery
{
    /**
     * @param UserId[] $ids
     * @return User[]
     */
    public function getUsersByIds(array $ids): array;
}
