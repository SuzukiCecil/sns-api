<?php

namespace App\Adapter\Presenter\ViewModel\Json\Activity;

use App\Adapter\Presenter\ViewModel\Json\JsonViewModel;
use App\Contexts\Activity\Domain\Model\Entity\Activator;

class ActivatorViewModel implements JsonViewModel
{
    public function __construct(
        private readonly Activator $activator,
    ) {
    }

    public function toArray(): array
    {
        return [
            "id" => $this->activator->id()->value(),
            "name" => $this->activator->name()->value(),
        ];
    }
}
