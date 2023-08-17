<?php

namespace App\Contexts\User\Domain\Service\Repository\Query;

use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;

interface UserQuery
{
    /**
     * @param ActivatorId[]|ActivatorId $ids
     * @return Activator[]
     */
    public function getActivatorsByIds(array|ActivatorId $ids): array;
}
