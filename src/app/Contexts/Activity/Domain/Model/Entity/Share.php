<?php

namespace App\Contexts\Activity\Domain\Model\Entity;

use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivityId;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;
use DateTimeImmutable;

/**
 * 特定の投稿に対するシェアクラス（アクティビティの1種）
 */
class Share extends Activity
{
    /**
     * @param ActivityId|null $id アクティビティのユニークID、永続化に至っていない場合はnull
     * @param DateTimeImmutable $datetime アクティビティの投稿日時
     * @param ActivatorId $activatorId アクティビティの投稿ユーザーID
     * @param ContributionId $sharedContributionId シェアする対象の投稿のID
     */
    public function __construct(
        ?ActivityId $id,
        DateTimeImmutable $datetime,
        ActivatorId $activatorId,
        private readonly ContributionId $sharedContributionId,
    ) {
        parent::__construct($id, $datetime, $activatorId);
    }

    public function sharedContributionId(): ContributionId
    {
        return $this->sharedContributionId;
    }
}
