<?php

namespace App\Contexts\Activity\Domain\Service\Repository\Query;

use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;
use App\Contexts\Activity\Domain\Model\Collection\Activities;

interface ActivityQuery
{
    /**
     * @param ContributionId[]|ContributionId $contributionIds
     * @return Activities
     */
    public function getContributionsByIds(array|ContributionId $contributionIds): Activities;

    /**
     * ユーザーIDからそのユーザーが行ったアクティビティの一覧を取得する関数
     * @param ActivatorId $activatorId
     * @param int|null $limit
     * @param int|null $offset
     * @return Activities
     */
    public function getActivitiesByActivatorId(
        ActivatorId $activatorId,
        ?int $limit = null,
        ?int $offset = null
    ): Activities;

    /**
     * ユーザーIDからそのユーザーがフォローしているユーザーが行ったアクティビティの一覧を取得する関数
     * @param ActivatorId $followeeId
     * @param int|null $limit
     * @param int|null $offset
     * @return Activities
     */
    public function getFollowersActivities(
        ActivatorId $followeeId,
        ?int $limit = null,
        ?int $offset = null
    ): Activities;
}
