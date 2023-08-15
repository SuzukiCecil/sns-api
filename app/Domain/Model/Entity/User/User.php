<?php

namespace App\Domain\Model\Entity\User;

use App\Domain\Model\ValueObject\User\Email;
use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Model\ValueObject\User\UserName;
use Exception;

class User implements \App\Domain\Model\Entity\User
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
