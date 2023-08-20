<?php

namespace App\Contexts\Activity\Application\Usecase;

use App\Contexts\Activity\Application\UsecaseInput\PostContributionInput;
use App\Contexts\Activity\Application\UsecaseOutput\Impls\PostContributionOutputImpl;
use App\Contexts\Activity\Application\UsecaseOutput\PostContributionOutput;
use App\Contexts\Activity\Domain\Service\Repository\Command\ActivityCommand;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivatorQuery;

class PostContributionUsecase
{
    public function __construct(
        private readonly ActivityCommand $activityCommand,
        private readonly ActivatorQuery  $activatorQuery,
    ) {
    }

    public function execute(PostContributionInput $input): PostContributionOutput
    {
        $activator = $this->activatorQuery->getActivatorsByIds($input->getPostedContribution()->activatorId())[0];
        $newContribution = $this->activityCommand->saveContribution($input->getPostedContribution());

        return new PostContributionOutputImpl($newContribution, $activator);
    }
}
