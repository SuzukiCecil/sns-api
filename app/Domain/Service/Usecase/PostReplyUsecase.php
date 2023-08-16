<?php

namespace App\Domain\Service\Usecase;

use App\Domain\Service\Repository\Command\ActivityCommand;
use App\Domain\Service\Repository\Query\ActivityQuery;
use App\Domain\Service\Repository\Query\UserQuery;
use App\Domain\Service\UsecaseInput\PostReplyInput;
use App\Domain\Service\UsecaseOutput\Impls\PostReplyOutputImpl;
use App\Domain\Service\UsecaseOutput\PostReplyOutput;

class PostReplyUsecase
{
    public function __construct(
        private readonly ActivityCommand $activityCommand,
        private readonly ActivityQuery $activityQuery,
        private readonly UserQuery $userQuery,
    ) {
    }

    public function execute(PostReplyInput $input): PostReplyOutput
    {
        $repliedContribution = $this->activityQuery->getContributionsByIds($input->getPostedReply()->repliedContributionId())->contributions()[0];
        $activators = $this->userQuery->getActivatorsByIds([
            $input->getPostedReply()->activatorId(),
            $repliedContribution->activatorId(),
        ]);
        $newReply = $this->activityCommand->saveReply($input->getPostedReply());

        return new PostReplyOutputImpl($newReply, $repliedContribution, $activators[0], $activators[1]);
    }
}
