<?php

namespace App\Contexts\Activity\Domain\Service\Repository\Query;

use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;

interface ActivatorQuery
{
    /**
     * @param ActivatorId[]|ActivatorId $ids
     * @return Activator[]
     */
    public function getActivatorsByIds(array|ActivatorId $ids): array;
}
