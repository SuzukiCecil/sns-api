<?php

namespace App\Contexts\Activity\Application\UsecaseInput;

use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;

interface GetActivitiesInput
{
    public function getActivatorId(): ActivatorId;
    public function getLimit(): ?int;
    public function getOffset(): ?int;
}
