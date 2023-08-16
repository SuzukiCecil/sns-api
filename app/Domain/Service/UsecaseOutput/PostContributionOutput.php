<?php

namespace App\Domain\Service\UsecaseOutput;

use App\Domain\Model\Entity\Activity\Activator;
use App\Domain\Model\Entity\Activity\Contribution;

interface PostContributionOutput
{
    public function getNewContribution(): Contribution;
    public function getActivator(): Activator;
}
