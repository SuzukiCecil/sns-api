<?php

namespace App\Contexts\Activity\Application\Usecase;

use App\Contexts\Activity\Application\UsecaseInput\GetTimelineInput;
use App\Contexts\Activity\Application\UsecaseOutput\GetTimelineOutput;
use App\Contexts\Activity\Application\UsecaseOutput\Impls\GetTimelineOutputImpl;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivityQuery;
use App\Contexts\User\Domain\Service\Repository\Query\UserQuery;

class GetTimelineUsecase
{
    public function __construct(
        private readonly ActivityQuery $activityQuery,
        private readonly UserQuery $userQuery,
    ) {
    }

    public function execute(GetTimelineInput $input): GetTimelineOutput
    {
        $activities = $this->activityQuery->getFollowersActivities(
            followeeId: $input->getTargetUserId(),
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
            $this->userQuery->getActivatorsByIds($activatorIds) :
            [];

        return new GetTimelineOutputImpl(
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
