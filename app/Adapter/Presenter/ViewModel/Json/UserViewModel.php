<?php

namespace App\Adapter\Presenter\ViewModel\Json;

use App\Domain\Model\Entity\User\User;

class UserViewModel implements JsonViewModel
{
    public function __construct(
        private readonly User $user,
    ) {
    }

    public function toArray(): array
    {
        return [
            "id" => $this->user->id()->value(),
            "userName" => $this->user->userName()->value(),
            "email" => $this->user->email()->value(),
        ];
    }
}
