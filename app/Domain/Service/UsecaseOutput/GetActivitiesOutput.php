<?php

namespace App\Domain\Service\UsecaseOutput;

use App\Domain\Model\Entity\Contribution;
use App\Domain\Model\Entity\User;
use App\Domain\Model\ValueObject\Activity\ContributionId;
use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Service\Dto\Activities;

interface GetActivitiesOutput
{
    public function getActivities(): Activities;

    public function getActivator(UserId $id): User;

    public function getContributionOfReplied(ContributionId $id): Contribution;

    public function getContributionOfShared(ContributionId $id): Contribution;
}
