<?php

namespace App\Contexts\User\Application\Usecase;

use App\Contexts\User\Application\UsecaseInput\UserSignInInput;
use App\Contexts\User\Application\UsecaseOutput\Impl\UserSignInOutputImpl;
use App\Contexts\User\Application\UsecaseOutput\UserSignInOutput;
use App\Contexts\User\Domain\Service\Repository\Query\UserQuery;

class UserSignInUsecase
{
    public function __construct(
        private readonly UserQuery $userQuery,
    ) {
    }

    public function execute(UserSignInInput $input): UserSignInOutput
    {
        $matchedUser = $this->userQuery->getByUserIdAndEmail($input->getUserId(), $input->getEmail());
        return new UserSignInOutputImpl($matchedUser);
    }
}
