<?php

namespace App\Domain\Service\Usecase;

use App\Domain\Service\Repository\Command\ActivityCommand;
use App\Domain\Service\Repository\Query\ActivityQuery;
use App\Domain\Service\Repository\Query\UserQuery;
use App\Domain\Service\UsecaseInput\PostShareInput;
use App\Domain\Service\UsecaseOutput\Impls\PostShareOutputImpl;
use App\Domain\Service\UsecaseOutput\PostShareOutput;

class PostShareUsecase
{
    public function __construct(
        private readonly ActivityCommand $activityCommand,
        private readonly ActivityQuery $activityQuery,
        private readonly UserQuery $userQuery,
    ) {
    }

    public function execute(PostShareInput $input): PostShareOutput
    {
        $sharedContribution = $this->activityQuery->getContributionsByIds($input->getPostedShare()->sharedContributionId())->contributions()[0];
        $activators = $this->userQuery->getActivatorsByIds([
            $input->getPostedShare()->activatorId(),
            $sharedContribution->activatorId(),
        ]);
        $newShare = $this->activityCommand->saveShare($input->getPostedShare());

        return new PostShareOutputImpl(
            $newShare,
            $sharedContribution,
            $activators[0],
            $activators[1],
        );
    }
}
