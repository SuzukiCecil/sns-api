<?php

namespace App\Domain\Service\UsecaseOutput\Impls;

use App\Domain\Model\Entity\Activity\Activator;
use App\Domain\Model\Entity\Activity\Contribution;
use App\Domain\Model\Entity\Activity\Share;
use App\Domain\Service\UsecaseOutput\PostShareOutput;

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
