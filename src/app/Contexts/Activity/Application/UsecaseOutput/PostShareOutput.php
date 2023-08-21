<?php

namespace App\Contexts\Activity\Application\UsecaseOutput;

use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Share;

interface PostShareOutput
{
    public function getNewShare(): Share;
    public function getSharedContribution(): Contribution;
    public function getActivator(): Activator;
    public function getActivatorOfSharedContribution(): Activator;
}
