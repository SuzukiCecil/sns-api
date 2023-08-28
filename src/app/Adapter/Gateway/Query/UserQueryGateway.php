<?php

namespace App\Adapter\Gateway\Query;

use App\Adapter\Gateway\Exception\InvalidDataException;
use App\Adapter\Gateway\Exception\NotFoundException;
use App\Adapter\Gateway\Model\Eloquent\UserEloquentModel;
use App\Adapter\Gateway\Query\Transformer\UserTransformer;
use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivatorQuery;
use App\Contexts\Base\Domain\Exception\ViolateDomainRuleException;
use App\Contexts\User\Domain\Model\Entity\User;
use App\Contexts\User\Domain\Model\ValueObject\Email;
use App\Contexts\User\Domain\Model\ValueObject\UserId;
use App\Contexts\User\Domain\Service\Repository\Query\UserQuery;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserQueryGateway implements UserQuery, ActivatorQuery
{
    public function __construct(
        private readonly UserTransformer $userTransformer,
    ) {
    }

    /**
     * @param UserId $userId
     * @param Email $email
     * @return User
     * @throws NotFoundException
     * @throws InvalidDataException
     */
    public function getByUserIdAndEmail(UserId $userId, Email $email): User
    {
        try {
            /** @var UserEloquentModel $userEloquentModel */
            $userEloquentModel = UserEloquentModel::query()
                ->where("id", "=", $userId->value())
                ->where("email", "=", $email->value())
                ->firstOrFail();
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        }
        return $this->userTransformer->toUser($userEloquentModel);
    }

    /**
     * @param ActivatorId[]|ActivatorId $ids
     * @return Activator[]
     * @throws ViolateDomainRuleException
     */
    public function getActivatorsByIds(array|ActivatorId $ids): array
    {
        $ids = !is_array($ids) ? [$ids] : $ids;

        $userEloquentModels = UserEloquentModel::query()
            ->whereIn(
                "id",
                array_map(fn(ActivatorId $id) => $id->value(), $ids)
            )
            ->get();

        return $userEloquentModels->map(function (UserEloquentModel $userEloquentModel) {
            return $this->userTransformer->toActivator($userEloquentModel);
        })->all();
    }
}
