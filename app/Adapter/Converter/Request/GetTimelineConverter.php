<?php

namespace App\Adapter\Converter\Request;

use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Service\UsecaseInput\GetTimelineInput;

class GetTimelineConverter extends RequestConverter implements GetTimelineInput
{
    private readonly UserId $targetUserId;
    private readonly ?int $limit;
    private readonly ?int $offset;

    protected function execute(): void
    {
        $this->targetUserId = new UserId($this->request->route("userId"));
        $this->limit = $this->request->input("limit") ?? null;
        $this->offset = $this->request->input("offset") ?? null;
    }

    public function getTargetUserId(): UserId
    {
        return $this->targetUserId;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }
}
