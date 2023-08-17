<?php

namespace App\Contexts\Activity\Domain\Model\Entity;

use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivityId;
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
     * @param ActivatorId $activatorId アクティビティの投稿ユーザーID
     */
    public function __construct(
        private readonly ?ActivityId $id,
        private readonly DateTimeImmutable $datetime,
        private readonly ActivatorId $activatorId,
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

    public function activatorId(): ActivatorId
    {
        return $this->activatorId;
    }
}
