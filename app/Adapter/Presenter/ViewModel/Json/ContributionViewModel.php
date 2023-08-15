<?php

namespace App\Adapter\Presenter\ViewModel\Json;

use App\Domain\Model\Entity\Contribution;

class ContributionViewModel implements JsonViewModel
{
    private const ACTIVITY_KIND = "contribution";

    public function __construct(
        private readonly Contribution $contribution
    ) {
    }

    public function toArray(): array
    {
        return [
            "activityKind" => self::ACTIVITY_KIND,
            "id" => $this->contribution->id()->value(),
            "datetime" => $this->contribution->datetime()->format("Y-m-d H:i:s"),
            "activatorId" => $this->contribution->activatorId()->value(),
        ];
    }
}
