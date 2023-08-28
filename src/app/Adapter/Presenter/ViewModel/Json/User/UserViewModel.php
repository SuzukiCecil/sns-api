<?php

namespace App\Adapter\Presenter\ViewModel\Json\User;

use App\Adapter\Presenter\ViewModel\Json\JsonViewModel;
use App\Contexts\User\Domain\Model\Entity\User;

class UserViewModel implements JsonViewModel
{
    public function __construct(private readonly User $user)
    {
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
