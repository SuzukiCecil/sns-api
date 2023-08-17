<?php

namespace App\Adapter\Converter\Request;

use App\Contexts\Activity\Application\UsecaseInput\GetTimelineInput;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;

class GetTimelineConverter extends RequestConverter implements GetTimelineInput
{
    private readonly ActivatorId $targetUserId;
    private readonly ?int $limit;
    private readonly ?int $offset;

    protected function execute(): void
    {
        $this->targetUserId = new ActivatorId($this->request->route("userId"));
        $this->limit = $this->request->input("limit") ?? null;
        $this->offset = $this->request->input("offset") ?? null;
    }

    public function getTargetUserId(): ActivatorId
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
