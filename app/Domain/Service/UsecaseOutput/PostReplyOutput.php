<?php

namespace App\Domain\Service\UsecaseOutput;

use App\Domain\Model\Entity\Activity\Activator;
use App\Domain\Model\Entity\Activity\Contribution;
use App\Domain\Model\Entity\Activity\Reply;

interface PostReplyOutput
{
    public function getNewReply(): Reply;
    public function getRepliedContribution(): Contribution;
    public function getActivator(): Activator;
    public function getActivatorOfRepliedContribution(): Activator;
}
