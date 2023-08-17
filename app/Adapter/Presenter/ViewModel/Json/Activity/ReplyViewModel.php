<?php

namespace App\Adapter\Presenter\ViewModel\Json\Activity;

use App\Adapter\Presenter\ViewModel\Json\JsonViewModel;
use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Reply;

class ReplyViewModel implements JsonViewModel
{
    private const ACTIVITY_KIND = "reply";

    /**
     * @param Reply $reply 返信
     * @param Activator $activator 返信を行ったユーザーのID
     * @param Contribution $repliedContribution 返信対象の投稿
     * @param Activator $activatorOfRepliedContribution 返信対象の投稿を行ったユーザーのID
     */
    public function __construct(
        private readonly Reply $reply,
        private readonly Activator $activator,
        private readonly Contribution $repliedContribution,
        private readonly Activator $activatorOfRepliedContribution,
    ) {
    }

    public function toArray(): array
    {
        return [
            "activityKind" => self::ACTIVITY_KIND,
            "id" => $this->reply->id()->value(),
            "datetime" => $this->reply->datetime()->format("Y-m-d H:i:s"),
            "body" => $this->reply->body()->value(),
            "activatorId" => $this->reply->activatorId()->value(),
            "activator" => new ActivatorViewModel($this->activator),
            "repliedContribution" => new ContributionViewModel($this->repliedContribution, $this->activatorOfRepliedContribution),
        ];
    }
}
