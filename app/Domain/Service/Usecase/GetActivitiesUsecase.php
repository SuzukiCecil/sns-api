<?php

namespace App\Domain\Service\Usecase;

use App\Domain\Service\Repository\Query\ActivityQuery;
use App\Domain\Service\UsecaseInput\GetActivitiesInput;
use App\Domain\Service\UsecaseOutput\GetActivitiesOutput;
use App\Domain\Service\UsecaseOutput\Impls\GetActivitiesOutputImpl;

class GetActivitiesUsecase
{
    public function __construct(
        private readonly ActivityQuery $activityQuery,
    ) {
    }

    public function execute(GetActivitiesInput $input): GetActivitiesOutput
    {
        $activities = $this->activityQuery->getActivitiesByActivatorId(
            activatorId: $input->getActivatorId(),
            limit: $input->getLimit(),
            offset: $input->getOffset(),
        );

        // 返信のアクティビティを取得している場合は返信対象の投稿の取得も行う
        $contributionsOfReplied = $activities->countOfReplies() > 0 ?
            $this->activityQuery->getContributionsByIds($activities->contributionIdsOfReplies()) :
            [];

        // シェアのアクティビティを取得している場合はシェア対象の投稿の取得も行う
        $contributionsOfShared = $activities->countOfShares() > 0 ?
            $this->activityQuery->getContributionsByIds($activities->contributionIdsOfShares()) :
            [];

        return new GetActivitiesOutputImpl(
            $activities,
            $contributionsOfReplied,
            $contributionsOfShared,
        );
    }
}
