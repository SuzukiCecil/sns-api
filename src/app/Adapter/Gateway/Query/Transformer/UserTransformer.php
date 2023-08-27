<?php

namespace App\Adapter\Gateway\Query\Transformer;

use App\Adapter\Gateway\Exception\InvalidDataException;
use App\Adapter\Gateway\Model\Eloquent\UserEloquentModel;
use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorName;
use Exception;

class UserTransformer
{
    public function toActivator(UserEloquentModel $userEloquentModel): Activator
    {
        try {
            return new Activator(
                new ActivatorId((string)$userEloquentModel->id),
                new ActivatorName($userEloquentModel->name),
            );
        } catch (Exception $e) {
            throw new InvalidDataException(
                message: "userEloquentModel:" .
                $userEloquentModel->toJson(),
                previous: $e,
            );
        }
    }
}
