<?php

namespace App\Adapter\Presenter\ViewModel\Json;

use App\Domain\Model\Entity\Contribution;
use App\Domain\Model\Entity\Reply;

class ReplyViewModel implements JsonViewModel
{
    private const ACTIVITY_KIND = "reply";

    public function __construct(
        private readonly Reply $reply,
        private readonly Contribution $repliedContribution,
    ) {
    }

    public function toArray(): array
    {
        return [
            "activityKind" => self::ACTIVITY_KIND,
            "id" => $this->reply->id()->value(),
            "datetime" => $this->reply->datetime()->format("Y-m-d H:i:s"),
            "activatorId" => $this->reply->activatorId()->value(),
            "repliedContribution" => new ContributionViewModel($this->repliedContribution),
        ];
    }
}
