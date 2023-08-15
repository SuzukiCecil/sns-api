<?php

namespace App\Domain\Service\UsecaseOutput\Impls;

use App\Domain\Model\Entity\Contribution;
use App\Domain\Model\ValueObject\Activity\ContributionId;
use App\Domain\Service\Dto\Activities;
use App\Domain\Service\UsecaseOutput\GetActivitiesOutput;
use Exception;

class GetActivitiesOutputImpl implements GetActivitiesOutput
{
    /**
     * @param Activities $activities
     * @param Activities $contributionsOfReplied
     * @param Activities $contributionsOfShared
     */
    public function __construct(
        private readonly Activities $activities,
        private readonly Activities $contributionsOfReplied,
        private readonly Activities $contributionsOfShared,
    ) {
    }

    public function getActivities(): Activities
    {
        return $this->activities;
    }

    public function getContributionOfReplied(ContributionId $id): Contribution
    {
        foreach ($this->contributionsOfReplied->contributions() as $contribution) {
            if ($contribution->contributionId()->equals($id)) {
                return $contribution;
            }
        }
        throw new Exception("No such contribution of replied");
    }

    public function getContributionOfShared(ContributionId $id): Contribution
    {
        foreach ($this->contributionsOfShared->contributions() as $contribution) {
            if ($contribution->contributionId()->equals($id)) {
                return $contribution;
            }
        }
        throw new Exception("No such contribution of shared");
    }
}
