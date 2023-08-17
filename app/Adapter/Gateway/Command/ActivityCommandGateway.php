<?php

namespace App\Adapter\Gateway\Command;

use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Reply;
use App\Contexts\Activity\Domain\Model\Entity\Share;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivityId;
use App\Contexts\Activity\Domain\Service\Repository\Command\ActivityCommand;

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
