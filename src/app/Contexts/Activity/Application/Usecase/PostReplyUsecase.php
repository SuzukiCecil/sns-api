<?php

namespace App\Contexts\Activity\Application\Usecase;

use App\Contexts\Activity\Application\UsecaseInput\PostReplyInput;
use App\Contexts\Activity\Application\UsecaseOutput\Impls\PostReplyOutputImpl;
use App\Contexts\Activity\Application\UsecaseOutput\PostReplyOutput;
use App\Contexts\Activity\Domain\Service\Repository\Command\ActivityCommand;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivatorQuery;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivityQuery;

class PostReplyUsecase
{
    public function __construct(
        private readonly ActivityCommand $activityCommand,
        private readonly ActivityQuery   $activityQuery,
        private readonly ActivatorQuery  $activatorQuery,
    ) {
    }

    public function execute(PostReplyInput $input): PostReplyOutput
    {
        $repliedContribution = $this->activityQuery->getContributionsByIds(
            $input->getPostedReply()->repliedContributionId()
        )->contributions()[0];
        $activators = $this->activatorQuery->getActivatorsByIds([
            $input->getPostedReply()->activatorId(),
            $repliedContribution->activatorId(),
        ]);
        $newReply = $this->activityCommand->saveReply($input->getPostedReply());

        return new PostReplyOutputImpl($newReply, $repliedContribution, $activators[0], $activators[1]);
    }
}
