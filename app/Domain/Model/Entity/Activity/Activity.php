<?php

namespace App\Domain\Model\Entity\Activity;

use App\Domain\Model\ValueObject\Activity\ActivityId;
use App\Domain\Model\ValueObject\User\UserId;
use DateTimeImmutable;
use Exception;

/**
 * アクティビティの抽象親クラス
 */
abstract class Activity
{
    /**
     * @param ActivityId|null $id アクティビティのユニークID、永続化に至っていない場合はnull
     * @param DateTimeImmutable $datetime アクティビティの投稿日時
     * @param UserId $activatorId アクティビティの投稿ユーザーID
     */
    public function __construct(
        private readonly ?ActivityId $id,
        private readonly DateTimeImmutable $datetime,
        private readonly UserId $activatorId,
    ) {
    }

    public function id(): ?ActivityId
    {
        if (is_null($this->id)) {
            throw new Exception("Activity isn`t perpetuation yet");
        }
        return $this->id;
    }

    public function datetime(): DateTimeImmutable
    {
        return $this->datetime;
    }

    public function activatorId(): UserId
    {
        return $this->activatorId;
    }
}
