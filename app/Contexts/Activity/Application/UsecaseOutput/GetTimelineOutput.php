<?php

namespace App\Contexts\Activity\Application\UsecaseOutput;

use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;
use App\Contexts\Activity\Domain\Service\Dto\Activities;

interface GetTimelineOutput
{
    public function getActivities(): Activities;

    /**
     * @param ActivatorId $id
     * @return Activator
     */
    public function getActivator(ActivatorId $id): Activator;

    public function getContributionOfReplied(ContributionId $id): Contribution;

    public function getContributionOfShared(ContributionId $id): Contribution;
}
