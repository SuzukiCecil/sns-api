<?php

namespace App\Domain\Model\Entity;

use App\Domain\Model\ValueObject\User\Email;
use App\Domain\Model\ValueObject\User\UserId;
use Exception;

class User
{
    public function __construct(
        private readonly ?UserId $id,
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

    public function email(): Email
    {
        return $this->email;
    }
}
