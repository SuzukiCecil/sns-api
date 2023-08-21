<?php

namespace App\Contexts\Activity\Application\UsecaseOutput\Impls;

use App\Contexts\Activity\Application\UsecaseOutput\PostReplyOutput;
use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Reply;

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
