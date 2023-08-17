<?php

namespace App\Contexts\Activity\Domain\Model\Entity;

use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivityId;
use App\Contexts\Activity\Domain\Model\ValueObject\Body;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;
use DateTimeImmutable;

/**
 * 特定の投稿に対する返信クラス（アクティビティの1種）
 */
class Reply extends Activity
{
    /**
     * @param ActivityId|null $id アクティビティのユニークID、永続化に至っていない場合はnull
     * @param DateTimeImmutable $datetime アクティビティの投稿日時
     * @param ActivatorId $activatorId アクティビティの投稿ユーザーID
     * @param ContributionId $repliedContributionId 返信する対象の投稿のID
     * @param Body $body 返信の本文
     */
    public function __construct(
        ?ActivityId $id,
        DateTimeImmutable $datetime,
        ActivatorId $activatorId,
        private readonly ContributionId $repliedContributionId,
        private readonly Body $body,
    ) {
        parent::__construct($id, $datetime, $activatorId);
    }

    public function repliedContributionId(): ContributionId
    {
        return $this->repliedContributionId;
    }

    public function body(): Body
    {
        return $this->body;
    }
}
