<?php

namespace App\Contexts\Activity\Application\UsecaseInput;

use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;

interface GetTimelineInput
{
    public function getTargetUserId(): ActivatorId;
    public function getLimit(): ?int;
    public function getOffset(): ?int;
}
