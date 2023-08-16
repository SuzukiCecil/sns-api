<?php

namespace App\Adapter\Gateway\Command;

use App\Domain\Model\Entity\Activity\Contribution;
use App\Domain\Model\Entity\Activity\Reply;
use App\Domain\Model\Entity\Activity\Share;
use App\Domain\Model\ValueObject\Activity\ActivityId;
use App\Domain\Service\Repository\Command\ActivityCommand;

class ActivityCommandGateway implements ActivityCommand
{
    public function saveContribution(Contribution $contribution): Contribution
    {
        // TODO：データストアへの永続化処理
        return new Contribution(
            new ActivityId("123"),
            $contribution->datetime(),
            $contribution->activatorId(),
            $contribution->body(),
        );
    }

    public function saveShare(Share $share): Share
    {
        // TODO：データストアへの永続化処理
        return new Share(
            new ActivityId("123"),
            $share->datetime(),
            $share->activatorId(),
            $share->sharedContributionId(),
        );
    }

    public function saveReply(Reply $reply): Reply
    {
        // TODO：データストアへの永続化処理
        return new Reply(
            new ActivityId("123"),
            $reply->datetime(),
            $reply->activatorId(),
            $reply->repliedContributionId(),
            $reply->body(),
        );
    }
}
