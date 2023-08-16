<?php

namespace App\Domain\Service\UsecaseOutput;

use App\Domain\Model\Entity\Activity\Activator;
use App\Domain\Model\Entity\Activity\Contribution;
use App\Domain\Model\Entity\Activity\Share;

interface PostShareOutput
{
    public function getNewShare(): Share;
    public function getSharedContribution(): Contribution;
    public function getActivator(): Activator;
    public function getActivatorOfSharedContribution(): Activator;
}
