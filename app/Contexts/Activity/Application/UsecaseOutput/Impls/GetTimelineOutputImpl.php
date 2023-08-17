<?php

namespace App\Contexts\Activity\Application\UsecaseOutput\Impls;

use App\Contexts\Activity\Application\UsecaseOutput\GetTimelineOutput;
use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;
use App\Contexts\Activity\Domain\Service\Dto\Activities;
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
     * @param ActivatorId $id
     * @return Activator
     */
    public function getActivator(ActivatorId $id): Activator
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
