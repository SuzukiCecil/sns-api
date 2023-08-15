<?php

namespace App\Domain\Service\UsecaseInput;

use App\Domain\Model\ValueObject\User\UserId;

interface GetTimelineInput
{
    public function getTargetUserId(): UserId;
    public function getLimit(): ?int;
    public function getOffset(): ?int;
}
