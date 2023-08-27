<?php

namespace App\Adapter\Gateway\Query;

use App\Adapter\Gateway\Model\Eloquent\ActivityEloquentModel;
use App\Adapter\Gateway\Model\Eloquent\ContributionEloquentModel;
use App\Adapter\Gateway\Model\Eloquent\FollowEloquentModel;
use App\Adapter\Gateway\Model\Eloquent\ReplyEloquentModel;
use App\Adapter\Gateway\Model\Eloquent\ShareEloquentModel;
use App\Adapter\Gateway\Query\Transformer\ActivityTransformer;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;
use App\Contexts\Activity\Domain\Model\Collection\Activities;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivityQuery;
use Illuminate\Support\Collection;

class ActivityQueryGateway implements ActivityQuery
{
    public function __construct(
        private readonly ActivityTransformer $activityTransformer,
    ) {
    }

    /**
     * @param ContributionId[]|ContributionId $contributionIds
     * @return Activities
     */
    public function getContributionsByIds(array|ContributionId $contributionIds): Activities
    {
        $contributionIds = is_array($contributionIds) ? $contributionIds : [$contributionIds];

        $activityEloquentModels = ActivityEloquentModel::query()
            ->whereIn(
                "id",
                array_map(fn(ContributionId $contributionId) => $contributionId->value(), $contributionIds)
            )
            ->get();

        return $this->toActivities($activityEloquentModels);
    }

    /**
     * ユーザーIDからそのユーザーが行ったアクティビティの一覧を取得する関数
     * @param ActivatorId $activatorId
     * @param int|null $limit
     * @param int|null $offset
     * @return Activities
     */
    public function getActivitiesByActivatorId(
        ActivatorId $activatorId,
        ?int        $limit = null,
        ?int        $offset = null
    ): Activities {
        $activityEloquentModels = ActivityEloquentModel::query()
            ->where("activator", "=", $activatorId->value())
            ->get();

        return $this->toActivities($activityEloquentModels);
    }

    /**
     * ユーザーIDからそのユーザーがフォローしているユーザーが行ったアクティビティの一覧を取得する関数
     * @param ActivatorId $followeeId
     * @param int|null $limit
     * @param int|null $offset
     * @return Activities
     */
    public function getFollowersActivities(
        ActivatorId $followeeId,
        ?int        $limit = null,
        ?int        $offset = null
    ): Activities {
        $followerIds = FollowEloquentModel::query()
            ->where("followee_id", "=", $followeeId->value())
            ->get()
            ->pluck("follower_id");
        $activityEloquentModels = ActivityEloquentModel::query()
            ->whereIn(
                "activator",
                $followerIds,
            )
            ->get();
        return $this->toActivities($activityEloquentModels);
    }

    private function toActivities(Collection $activityEloquentModels): Activities
    {
        $idsOfContribution = $activityEloquentModels->filter(
            fn(ActivityEloquentModel $activityEloquentModel) => $activityEloquentModel->isContribution()
        )->pluck("child_id");
        $idsOfShare = $activityEloquentModels->filter(
            fn(ActivityEloquentModel $activityEloquentModel) => $activityEloquentModel->isContribution()
        )->pluck("child_id");
        $idsOfReply = $activityEloquentModels->filter(
            fn(ActivityEloquentModel $activityEloquentModel) => $activityEloquentModel->isContribution()
        )->pluck("child_id");

        $contributionEloquentModels = $idsOfContribution->count() > 0 ?
            ContributionEloquentModel::query()
                ->whereIn("id", $idsOfContribution)
                ->get()
            : new \Illuminate\Database\Eloquent\Collection();
        $shareEloquentModels = $idsOfContribution->count() > 0 ?
            ShareEloquentModel::query()
                ->whereIn("id", $idsOfShare)
                ->get()
            : new \Illuminate\Database\Eloquent\Collection();
        $replyEloquentModels = $idsOfContribution->count() > 0 ?
            ReplyEloquentModel::query()
                ->whereIn("id", $idsOfReply)
                ->get()
            : new \Illuminate\Database\Eloquent\Collection();

        return new Activities(
            $activityEloquentModels->map(
                function (ActivityEloquentModel $activityEloquentModel) use (
                    $contributionEloquentModels,
                    $shareEloquentModels,
                    $replyEloquentModels,
                ) {
                    /** @var ContributionEloquentModel|null $contributionEloquentModel */
                    $contributionEloquentModel = $contributionEloquentModels->find($activityEloquentModel->child_id);
                    /** @var ShareEloquentModel|null $shareEloquentModel */
                    $shareEloquentModel = $shareEloquentModels->find($activityEloquentModel->child_id);
                    /** @var ReplyEloquentModel|null $replyEloquentModel */
                    $replyEloquentModel = $replyEloquentModels->find($activityEloquentModel->child_id);

                    return $this->activityTransformer->toActivity(
                        $activityEloquentModel,
                        $contributionEloquentModel,
                        $shareEloquentModel,
                        $replyEloquentModel,
                    );
                }
            )->all(),
        );
    }
}
