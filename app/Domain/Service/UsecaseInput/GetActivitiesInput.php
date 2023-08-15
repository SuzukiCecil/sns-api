<?php

namespace App\Domain\Service\UsecaseInput;

use App\Domain\Model\ValueObject\User\UserId;

interface GetActivitiesInput
{
    public function getActivatorId(): UserId;
    public function getLimit(): ?int;
    public function getOffset(): ?int;
}
