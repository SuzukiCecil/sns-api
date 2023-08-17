<?php

namespace App\Contexts\Activity\Domain\Model\Entity;

use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorName;

class Activator
{
    public function __construct(
        private readonly ActivatorId $id,
        private readonly ActivatorName $name,
    ) {
    }

    public function id(): ActivatorId
    {
        return $this->id;
    }

    public function name(): ActivatorName
    {
        return $this->name;
    }
}
