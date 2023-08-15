<?php

namespace App\Domain\Model\Entity;

use App\Domain\Model\Exception\InvalidDataException;
use App\Domain\Model\ValueObject\Activity\ActivityId;
use App\Domain\Model\ValueObject\Activity\Body;
use App\Domain\Model\ValueObject\Activity\ContributionId;
use App\Domain\Model\ValueObject\User\UserId;
use DateTimeImmutable;

/**
 * 投稿クラス（アクティビティの1種）
 */
class Contribution extends Activity
{
    /**
     * @param ActivityId|null $id アクティビティのユニークID、永続化に至っていない場合はnull
     * @param DateTimeImmutable $datetime アクティビティの投稿日時
     * @param UserId $activatorId アクティビティの投稿ユーザーID
     * @param Body $body 投稿の本文
     */
    public function __construct(
        ?ActivityId $id,
        DateTimeImmutable $datetime,
        UserId $activatorId,
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
