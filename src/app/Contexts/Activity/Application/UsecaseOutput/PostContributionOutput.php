<?php

namespace App\Contexts\Activity\Application\UsecaseOutput;

use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;

interface PostContributionOutput
{
    public function getNewContribution(): Contribution;
    public function getActivator(): Activator;
}
