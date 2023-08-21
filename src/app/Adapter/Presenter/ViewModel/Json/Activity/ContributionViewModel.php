<?php

namespace App\Adapter\Presenter\ViewModel\Json\Activity;

use App\Adapter\Presenter\ViewModel\Json\JsonViewModel;
use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;

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
            "activator" => new ActivatorViewModel($this->activator),
            "activatorId" => $this->contribution->activatorId()->value(),
            "body" => $this->contribution->body()->value(),
        ];
    }
}
