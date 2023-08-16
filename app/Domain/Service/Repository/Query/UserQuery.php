<?php

namespace App\Domain\Service\Repository\Query;

use App\Domain\Model\Entity\Activity\Activator;
use App\Domain\Model\ValueObject\User\UserId;

interface UserQuery
{
    /**
     * @param UserId[]|UserId $ids
     * @return Activator[]
     */
    public function getActivatorsByIds(array|UserId $ids): array;
}
