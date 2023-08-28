<?php

namespace App\Adapter\Converter\Request;

use App\Contexts\User\Application\UsecaseInput\UserSignInInput;
use App\Contexts\User\Domain\Model\ValueObject\Email;
use App\Contexts\User\Domain\Model\ValueObject\UserId;

class UserSignInConverter extends RequestConverter implements UserSignInInput
{
    private readonly UserId $userId;
    private readonly Email $email;

    protected function execute(): void
    {
        $this->userId = new UserId((string)$this->request->input("userId"));
        $this->email = new Email((string)$this->request->input("email"));
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }
}
