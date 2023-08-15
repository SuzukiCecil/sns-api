<?php

namespace App\Adapter\Gateway\Query;

use App\Domain\Model\Entity\User\User;
use App\Domain\Model\Exception\InvalidDataException;
use App\Domain\Model\ValueObject\User\Email;
use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Model\ValueObject\User\UserName;
use App\Domain\Service\Repository\Query\UserQuery;

class UserQueryGateway implements UserQuery
{

    /**
     * @param UserId[] $ids
     * @return User[]
     * @throws InvalidDataException
     */
    public function getUsersByIds(array $ids): array
    {
        $users = [];
        foreach ($ids as $id) {
            $users[] = new User(
                $id,
                new UserName("UserName" . $id->value()),
                new Email($id->value() . "@example.com"),
            );
        }
        return $users;
    }
}
