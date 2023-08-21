<?php

namespace App\Contexts\Activity\Application\UsecaseOutput\Impls;

use App\Contexts\Activity\Application\UsecaseOutput\PostContributionOutput;
use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;

class PostContributionOutputImpl implements PostContributionOutput
{
    public function __construct(
        private readonly Contribution $newContribution,
        private readonly Activator $activator,
    ) {
    }

    public function getNewContribution(): Contribution
    {
        return $this->newContribution;
    }

    public function getActivator(): Activator
    {
        return $this->activator;
    }
}
