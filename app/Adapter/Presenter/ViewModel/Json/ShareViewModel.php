<?php

namespace App\Adapter\Presenter\ViewModel\Json;

use App\Domain\Model\Entity\Contribution;
use App\Domain\Model\Entity\Share;

class ShareViewModel implements JsonViewModel
{
    private const ACTIVITY_KIND = "share";

    public function __construct(
        private readonly Share $share,
        private readonly Contribution $sharedContribution,
    ) {
    }

    public function toArray(): array
    {
        return [
            "activityKind" => self::ACTIVITY_KIND,
            "id" => $this->share->id()->value(),
            "datetime" => $this->share->datetime()->format("Y-m-d H:i:s"),
            "activatorId" => $this->share->activatorId()->value(),
            "sharedContribution" => new ContributionViewModel($this->sharedContribution),
        ];
    }
}
