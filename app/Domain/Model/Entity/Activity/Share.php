<?php

namespace App\Domain\Model\Entity\Activity;

use App\Domain\Model\ValueObject\Activity\ActivityId;
use App\Domain\Model\ValueObject\Activity\ContributionId;
use App\Domain\Model\ValueObject\User\UserId;
use DateTimeImmutable;

/**
 * 特定の投稿に対するシェアクラス（アクティビティの1種）
 */
class Share extends Activity
{
    /**
     * @param ActivityId|null $id アクティビティのユニークID、永続化に至っていない場合はnull
     * @param DateTimeImmutable $datetime アクティビティの投稿日時
     * @param UserId $activatorId アクティビティの投稿ユーザーID
     * @param ContributionId $sharedContributionId シェアする対象の投稿のID
     */
    public function __construct(
        ?ActivityId $id,
        DateTimeImmutable $datetime,
        UserId $activatorId,
        private readonly ContributionId $sharedContributionId,
    ) {
        parent::__construct($id, $datetime, $activatorId);
    }

    public function sharedContributionId(): ContributionId
    {
        return $this->sharedContributionId;
    }
}
