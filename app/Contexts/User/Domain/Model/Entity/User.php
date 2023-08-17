<?php

namespace App\Contexts\User\Domain\Model\Entity;

use App\Contexts\User\Domain\Model\ValueObject\Email;
use App\Contexts\User\Domain\Model\ValueObject\UserId;
use App\Contexts\User\Domain\Model\ValueObject\UserName;
use Exception;

class User
{
    public function __construct(
        private readonly ?UserId $id,
        private readonly UserName $userName,
        private readonly Email $email,
    ) {
    }

    public function id(): UserId
    {
        if (is_null($this->id)) {
            throw new Exception("User isn`t perpetuation yet");
        }
        return $this->id;
    }

    public function userName(): UserName
    {
        return $this->userName;
    }

    public function email(): Email
    {
        return $this->email;
    }
}
