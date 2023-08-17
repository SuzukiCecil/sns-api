<?php

namespace App\Adapter\Converter\Request;

use App\Contexts\Activity\Application\UsecaseInput\GetActivitiesInput;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;

class GetActivitiesConverter extends RequestConverter implements GetActivitiesInput
{
    private readonly ActivatorId $activatorId;
    private readonly ?int $limit;
    private readonly ?int $offset;

    protected function execute(): void
    {
        $this->activatorId = new ActivatorId($this->request->route("activatorId"));
        $this->limit = $this->request->input("limit") ?? null;
        $this->offset = $this->request->input("offset") ?? null;
    }

    public function getActivatorId(): ActivatorId
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
