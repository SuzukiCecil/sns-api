<?php

namespace App\Contexts\Activity\Application\Usecase;

use App\Contexts\Activity\Application\UsecaseInput\PostShareInput;
use App\Contexts\Activity\Application\UsecaseOutput\Impls\PostShareOutputImpl;
use App\Contexts\Activity\Application\UsecaseOutput\PostShareOutput;
use App\Contexts\Activity\Domain\Service\Repository\Command\ActivityCommand;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivityQuery;
use App\Contexts\User\Domain\Service\Repository\Query\UserQuery;

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
        $sharedContribution = $this->activityQuery->getContributionsByIds(
            $input->getPostedShare()->sharedContributionId()
        )->contributions()[0];
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
