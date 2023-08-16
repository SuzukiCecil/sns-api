<?php

namespace App\Domain\Service\UsecaseOutput\Impls;

use App\Domain\Model\Entity\Activity\Activator;
use App\Domain\Model\Entity\Activity\Contribution;
use App\Domain\Service\UsecaseOutput\PostContributionOutput;

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
