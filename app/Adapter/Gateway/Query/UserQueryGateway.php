<?php

namespace App\Adapter\Gateway\Query;

use App\Domain\Model\Entity\Activity\Activator;
use App\Domain\Model\Exception\InvalidDataException;
use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Model\ValueObject\User\UserName;
use App\Domain\Service\Repository\Query\UserQuery;

class UserQueryGateway implements UserQuery
{

    /**
     * @param UserId[] $ids
     * @return Activator[]
     * @throws InvalidDataException
     */
    public function getActivatorsByIds(array $ids): array
    {
        $users = [];
        foreach ($ids as $id) {
            $users[] = new Activator(
                $id,
                new UserName("UserName" . $id->value()),
            );
        }
        return $users;
    }
}
