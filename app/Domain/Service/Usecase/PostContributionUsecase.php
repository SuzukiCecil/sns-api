<?php

namespace App\Domain\Service\Usecase;

use App\Domain\Service\Repository\Command\ActivityCommand;
use App\Domain\Service\Repository\Query\UserQuery;
use App\Domain\Service\UsecaseInput\PostContributionInput;
use App\Domain\Service\UsecaseOutput\Impls\PostContributionOutputImpl;
use App\Domain\Service\UsecaseOutput\PostContributionOutput;

class PostContributionUsecase
{
    public function __construct(
        private readonly ActivityCommand $activityCommand,
        private readonly UserQuery $userQuery,
    ) {
    }

    public function execute(PostContributionInput $input): PostContributionOutput
    {
        $activator = $this->userQuery->getActivatorsByIds($input->getPostedContribution()->activatorId())[0];
        $newContribution = $this->activityCommand->saveContribution($input->getPostedContribution());

        return new PostContributionOutputImpl($newContribution, $activator);
    }
}
