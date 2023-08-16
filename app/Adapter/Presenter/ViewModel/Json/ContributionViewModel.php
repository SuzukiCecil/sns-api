<?php

namespace App\Adapter\Presenter\ViewModel\Json;

use App\Domain\Model\Entity\Activity\Activator;
use App\Domain\Model\Entity\Activity\Contribution;

class ContributionViewModel implements JsonViewModel
{
    private const ACTIVITY_KIND = "contribution";

    public function __construct(
        private readonly Contribution $contribution,
        private readonly Activator $activator,
    ) {
    }

    public function toArray(): array
    {
        return [
            "activityKind" => self::ACTIVITY_KIND,
            "id" => $this->contribution->id()->value(),
            "datetime" => $this->contribution->datetime()->format("Y-m-d H:i:s"),
            "activator" => new UserViewModel($this->activator),
            "activatorId" => $this->contribution->activatorId()->value(),
            "body" => $this->contribution->body()->value(),
        ];
    }
}
