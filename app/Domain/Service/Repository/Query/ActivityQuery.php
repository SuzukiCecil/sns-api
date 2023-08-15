<?php

namespace App\Domain\Service\Repository\Query;

use App\Domain\Model\ValueObject\Activity\ContributionId;
use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Service\Dto\Activities;

interface ActivityQuery
{
    /**
     * @param ContributionId[] $contributionIds
     * @return Activities
     */
    public function getContributionsByIds(array $contributionIds): Activities;

    /**
     * ユーザーIDからそのユーザーが行ったアクティビティの一覧を取得する関数
     * @param UserId $activatorId
     * @param int|null $limit
     * @param int|null $offset
     * @return Activities
     */
    public function getActivitiesByActivatorId(UserId $activatorId, ?int $limit = null, ?int $offset = null): Activities;

    /**
     * ユーザーIDからそのユーザーがフォローしているユーザーが行ったアクティビティの一覧を取得する関数
     * @param UserId $followeeId
     * @param int|null $limit
     * @param int|null $offset
     * @return Activities
     */
    public function getFollowersActivities(UserId $followeeId, ?int $limit = null, ?int $offset = null): Activities;
}
