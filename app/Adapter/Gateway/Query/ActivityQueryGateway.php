<?php

namespace App\Adapter\Gateway\Query;

use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Reply;
use App\Contexts\Activity\Domain\Model\Entity\Share;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivityId;
use App\Contexts\Activity\Domain\Model\ValueObject\Body;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;
use App\Contexts\Activity\Domain\Service\Dto\Activities;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivityQuery;

class ActivityQueryGateway implements ActivityQuery
{
    /**
     * @param ContributionId[]|ContributionId $contributionIds
     * @return Activities
     */
    public function getContributionsByIds(array|ContributionId $contributionIds): Activities
    {
        $contributionIds = is_array($contributionIds) ? $contributionIds : [$contributionIds];

        // TODO：データストアからのアクティビティ生成処理の実装
        $contributions = [];
        foreach ($contributionIds as $contributionId) {
            $contributions[] = new Contribution(
                new ActivityId($contributionId->value()),
                new \DateTimeImmutable(),
                new ActivatorId("1" . $contributionId->value()),
                new Body("ContributionBody" . $contributionId->value()),
            );
        }
        return new Activities($contributions);
    }

    /**
     * ユーザーIDからそのユーザーが行ったアクティビティの一覧を取得する関数
     * @param ActivatorId $activatorId
     * @param int|null $limit
     * @param int|null $offset
     * @return Activities
     */
    public function getActivitiesByActivatorId(ActivatorId $activatorId, ?int $limit = null, ?int $offset = null): Activities
    {
        // TODO：データストアからのアクティビティ生成処理の実装
        return new Activities([
            new Contribution(
                new ActivityId("1"),
                new \DateTimeImmutable(),
                new ActivatorId("11"),
                new Body("ContributionBody1"),
            ),
            new Contribution(
                new ActivityId("2"),
                new \DateTimeImmutable(),
                new ActivatorId("11"),
                new Body("ContributionBody2"),
            ),
            new Share(
                new ActivityId("3"),
                new \DateTimeImmutable(),
                new ActivatorId("11"),
                new ContributionId("101"),
            ),
            new Share(
                new ActivityId("4"),
                new \DateTimeImmutable(),
                new ActivatorId("11"),
                new ContributionId("102"),
            ),
            new Reply(
                new ActivityId("5"),
                new \DateTimeImmutable(),
                new ActivatorId("11"),
                new ContributionId("101"),
                new Body("ReplyBody1"),
            ),
            new Reply(
                new ActivityId("6"),
                new \DateTimeImmutable(),
                new ActivatorId("11"),
                new ContributionId("103"),
                new Body("ReplyBody2"),
            ),
        ]);
    }

    /**
     * ユーザーIDからそのユーザーがフォローしているユーザーが行ったアクティビティの一覧を取得する関数
     * @param ActivatorId $followeeId
     * @param int|null $limit
     * @param int|null $offset
     * @return Activities
     */
    public function getFollowersActivities(ActivatorId $followeeId, ?int $limit = null, ?int $offset = null): Activities
    {
        // TODO：データストアからのアクティビティ生成処理の実装
        return new Activities([
            new Contribution(
                new ActivityId("11"),
                new \DateTimeImmutable(),
                new ActivatorId("21"),
                new Body("ContributionBody1"),
            ),
            new Contribution(
                new ActivityId("12"),
                new \DateTimeImmutable(),
                new ActivatorId("22"),
                new Body("ContributionBody2"),
            ),
            new Share(
                new ActivityId("13"),
                new \DateTimeImmutable(),
                new ActivatorId("22"),
                new ContributionId("101"),
            ),
            new Share(
                new ActivityId("14"),
                new \DateTimeImmutable(),
                new ActivatorId("23"),
                new ContributionId("102"),
            ),
            new Reply(
                new ActivityId("15"),
                new \DateTimeImmutable(),
                new ActivatorId("24"),
                new ContributionId("101"),
                new Body("ReplyBody1"),
            ),
            new Reply(
                new ActivityId("16"),
                new \DateTimeImmutable(),
                new ActivatorId("24"),
                new ContributionId("103"),
                new Body("ReplyBody2"),
            ),
        ]);
    }
}
