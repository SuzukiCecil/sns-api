<?php

namespace App\Adapter\Presenter\ViewModel\Json;

use App\Domain\Model\Entity\Contribution;
use App\Domain\Model\Entity\Reply;
use App\Domain\Model\Entity\User;

class ReplyViewModel implements JsonViewModel
{
    private const ACTIVITY_KIND = "reply";

    /**
     * @param Reply $reply 返信
     * @param User|null $activator 返信を行ったユーザーのID
     * @param Contribution $repliedContribution 返信対象の投稿
     * @param User|null $activatorOfRepliedContribution 返信対象の投稿を行ったユーザーのID
     */
    public function __construct(
        private readonly Reply $reply,
        private readonly ?User $activator,
        private readonly Contribution $repliedContribution,
        private readonly ?User $activatorOfRepliedContribution,
    ) {
    }

    public function toArray(): array
    {
        return [
            "activityKind" => self::ACTIVITY_KIND,
            "id" => $this->reply->id()->value(),
            "datetime" => $this->reply->datetime()->format("Y-m-d H:i:s"),
            "activatorId" => $this->reply->activatorId()->value(),
            "activator" => match (true) {
                !is_null($this->activator) => new UserViewModel($this->activator),
                default => null,
            },
            "repliedContribution" => new ContributionViewModel($this->repliedContribution, $this->activatorOfRepliedContribution),
        ];
    }
}
