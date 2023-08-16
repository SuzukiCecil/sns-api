<?php

namespace App\Domain\Service\UsecaseOutput\Impls;

use App\Domain\Model\Entity\Activity\Activator;
use App\Domain\Model\Entity\Activity\Contribution;
use App\Domain\Model\Entity\Activity\Reply;
use App\Domain\Service\UsecaseOutput\PostReplyOutput;

class PostReplyOutputImpl implements PostReplyOutput
{
    public function __construct(
        private readonly Reply $newReply,
        private readonly Contribution $repliedContribution,
        private readonly Activator $activator,
        private readonly Activator $activatorOfRepliedContribution,
    ) {
    }

    public function getNewReply(): Reply
    {
        return $this->newReply;
    }

    public function getRepliedContribution(): Contribution
    {
        return $this->repliedContribution;
    }

    public function getActivator(): Activator
    {
        return $this->activator;
    }

    public function getActivatorOfRepliedContribution(): Activator
    {
        return $this->activatorOfRepliedContribution;
    }
}
