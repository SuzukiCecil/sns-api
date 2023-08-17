<?php

namespace App\Contexts\Activity\Domain\Model\Entity;

use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivityId;
use App\Contexts\Activity\Domain\Model\ValueObject\Body;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;
use App\Contexts\Base\Domain\Model\Exception\InvalidDataException;
use DateTimeImmutable;

/**
 * 投稿クラス（アクティビティの1種）
 */
class Contribution extends Activity
{
    /**
     * @param ActivityId|null $id アクティビティのユニークID、永続化に至っていない場合はnull
     * @param DateTimeImmutable $datetime アクティビティの投稿日時
     * @param ActivatorId $activatorId アクティビティの投稿ユーザーID
     * @param Body $body 投稿の本文
     */
    public function __construct(
        ?ActivityId $id,
        DateTimeImmutable $datetime,
        ActivatorId $activatorId,
        private readonly Body $body,
    ) {
        parent::__construct($id, $datetime, $activatorId);
    }

    public function body(): Body
    {
        return $this->body;
    }

    /**
     * アクティビティIDを投稿IDとして取得する関数
     * @return ContributionId
     * @throws InvalidDataException
     */
    public function contributionId(): ContributionId
    {
        return new ContributionId($this->id()->value());
    }
}
