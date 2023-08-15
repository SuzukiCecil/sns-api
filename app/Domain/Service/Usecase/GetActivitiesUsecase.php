<?php

namespace App\Domain\Service\Usecase;

use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Service\Repository\Query\ActivityQuery;
use App\Domain\Service\Repository\Query\UserQuery;
use App\Domain\Service\UsecaseInput\GetActivitiesInput;
use App\Domain\Service\UsecaseOutput\GetActivitiesOutput;
use App\Domain\Service\UsecaseOutput\Impls\GetActivitiesOutputImpl;

class GetActivitiesUsecase
{
    public function __construct(
        private readonly ActivityQuery $activityQuery,
        private readonly UserQuery $userQuery,
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
            $this->userQuery->getUsersByIds($activatorIds) :
            [];

        return new GetActivitiesOutputImpl(
            $activities,
            $activators,
            $contributionsOfReplied,
            $contributionsOfShared,
        );
    }

    /**
     * @param UserId[] $listA
     * @param UserId[] $listB
     * @return UserId[]
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
