<?php

namespace App\Adapter\Gateway\Query;

use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorName;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivatorQuery;
use App\Contexts\Base\Domain\Exception\ViolateDomainRuleException;
use App\Contexts\User\Domain\Service\Repository\Query\UserQuery;

class UserQueryGateway implements UserQuery, ActivatorQuery
{

    /**
     * @param ActivatorId[]|ActivatorId $ids
     * @return Activator[]
     * @throws ViolateDomainRuleException
     */
    public function getActivatorsByIds(array|ActivatorId $ids): array
    {
        $ids = !is_array($ids) ? [$ids] : $ids;
        $users = [];
        foreach ($ids as $id) {
            $users[] = new Activator(
                $id,
                new ActivatorName("UserName" . $id->value()),
            );
        }
        return $users;
    }
}
