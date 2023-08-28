<?php

namespace App\Contexts\User\Application\UsecaseOutput;

use App\Contexts\User\Domain\Model\Entity\User;

interface UserSignInOutput
{
    public function getMatchedUser(): User;
}
