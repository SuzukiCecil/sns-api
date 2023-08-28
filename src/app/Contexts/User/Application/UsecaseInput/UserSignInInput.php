<?php

namespace App\Contexts\User\Application\UsecaseInput;

use App\Contexts\User\Domain\Model\ValueObject\Email;
use App\Contexts\User\Domain\Model\ValueObject\UserId;

interface UserSignInInput
{
    public function getUserId(): UserId;
    public function getEmail(): Email;
}
