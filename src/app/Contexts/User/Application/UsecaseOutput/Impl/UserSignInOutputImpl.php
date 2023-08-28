<?php

namespace App\Contexts\User\Application\UsecaseOutput\Impl;

use App\Contexts\User\Application\UsecaseOutput\UserSignInOutput;
use App\Contexts\User\Domain\Model\Entity\User;

class UserSignInOutputImpl implements UserSignInOutput
{
    public function __construct(
        private readonly User $matchedUser,
    ) {
    }

    public function getMatchedUser(): User
    {
        return $this->matchedUser;
    }
}
