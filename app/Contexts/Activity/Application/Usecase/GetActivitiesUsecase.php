<?php

namespace App\Contexts\Activity\Application\Usecase;

use App\Contexts\Activity\Application\UsecaseInput\GetActivitiesInput;
use App\Contexts\Activity\Application\UsecaseOutput\GetActivitiesOutput;
use App\Contexts\Activity\Application\UsecaseOutput\Impls\GetActivitiesOutputImpl;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivatorQuery;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivityQuery;

class GetActivitiesUsecase
{
    public function __construct(
        private readonly ActivityQuery  $activityQuery,
        private readonly ActivatorQuery $activatorQuery,
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

        // アクティビティを行ったユーザーの取得も行う
        $activatorIds = $activities->uniqueActivatorIds();
        $activatorIds = $this->mergeActivatorIds($activatorIds, $contributionsOfReplied->uniqueActivatorIds());
        $activatorIds = $this->mergeActivatorIds($activatorIds, $contributionsOfShared->uniqueActivatorIds());
        $activators = $activities->count() > 0 ?
            $this->activatorQuery->getActivatorsByIds($activatorIds) :
            [];

        return new GetActivitiesOutputImpl(
            $activities,
            $activators,
            $contributionsOfReplied,
            $contributionsOfShared,
        );
    }

    /**
     * @param ActivatorId[] $listA
     * @param ActivatorId[] $listB
     * @return ActivatorId[]
     */
    private function mergeActivatorIds(array $listA, array $listB): array
    {
        foreach ($listB as $valueB) {
            foreach ($listA as $valueA) {
                if ($valueB->equals($valueA)) {
                    continue 2;
                }
            }
            $listA[] = $valueB;
        }
        return $listA;
    }
}
