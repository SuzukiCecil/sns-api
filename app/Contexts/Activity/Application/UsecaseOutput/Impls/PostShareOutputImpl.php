<?php

namespace App\Contexts\Activity\Application\UsecaseOutput\Impls;

use App\Contexts\Activity\Application\UsecaseOutput\PostShareOutput;
use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Share;

class PostShareOutputImpl implements PostShareOutput
{
    public function __construct(
        private readonly Share $newShare,
        private readonly Contribution $sharedContribution,
        private readonly Activator $activator,
        private readonly Activator $activatorOfSharedContribution,

    ) {
    }

    public function getNewShare(): Share
    {
        return $this->newShare;
    }

    public function getSharedContribution(): Contribution
    {
        return $this->sharedContribution;
    }

    public function getActivator(): Activator
    {
        return $this->activator;
    }

    public function getActivatorOfSharedContribution(): Activator
    {
        return $this->activatorOfSharedContribution;
    }
}
