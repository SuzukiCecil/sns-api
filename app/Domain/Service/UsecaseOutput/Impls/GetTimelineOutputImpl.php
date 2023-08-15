<?php

namespace App\Domain\Service\UsecaseOutput\Impls;

use App\Domain\Model\Entity\Activity\Activator;
use App\Domain\Model\Entity\Activity\Contribution;
use App\Domain\Model\ValueObject\Activity\ContributionId;
use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Service\Dto\Activities;
use App\Domain\Service\UsecaseOutput\GetTimelineOutput;
use Exception;

class GetTimelineOutputImpl implements GetTimelineOutput
{
    /**
     * @param Activities $activities
     * @param Activator[] $activators
     * @param Activities $contributionsOfReplied
     * @param Activities $contributionsOfShared
     */
    public function __construct(
        private readonly Activities $activities,
        private readonly array $activators,
        private readonly Activities $contributionsOfReplied,
        private readonly Activities $contributionsOfShared,
    ) {
    }

    public function getActivities(): Activities
    {
        return $this->activities;
    }

    /**
     * @param UserId $id
     * @return Activator
     */
    public function getActivator(UserId $id): Activator
    {
        foreach ($this->activators as $activator) {
            if ($activator->id()->equals($id)) {
                return $activator;
            }
        }
        throw new Exception("No such contribution of replied");
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
