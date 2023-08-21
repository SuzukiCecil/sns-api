<?php

namespace App\Contexts\Activity\Application\UsecaseOutput;

use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Reply;

interface PostReplyOutput
{
    public function getNewReply(): Reply;
    public function getRepliedContribution(): Contribution;
    public function getActivator(): Activator;
    public function getActivatorOfRepliedContribution(): Activator;
}
