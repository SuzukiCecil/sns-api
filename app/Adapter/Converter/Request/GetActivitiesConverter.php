<?php

namespace App\Adapter\Converter\Request;

use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Service\UsecaseInput\GetActivitiesInput;

class GetActivitiesConverter extends RequestConverter implements GetActivitiesInput
{
    private readonly UserId $activatorId;
    private readonly ?int $limit;
    private readonly ?int $offset;

    protected function execute(): void
    {
        $this->activatorId = new UserId($this->request->route("activatorId"));
        $this->limit = $this->request->input("limit") ?? null;
        $this->offset = $this->request->input("offset") ?? null;
    }

    public function getActivatorId(): UserId
    {
        return $this->activatorId;
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
