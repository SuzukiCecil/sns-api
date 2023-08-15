<?php

namespace App\Domain\Service\Dto;

use App\Domain\Model\Entity\Activity;
use App\Domain\Model\Entity\Contribution;
use App\Domain\Model\Entity\Reply;
use App\Domain\Model\Entity\Share;
use App\Domain\Model\ValueObject\Activity\ActivityId;
use App\Domain\Model\ValueObject\Activity\ContributionId;
use App\Domain\Model\ValueObject\User\UserId;

class Activities
{
    /**
     * @param Activity[] $values
     */
    public function __construct(
        public readonly array $values
    ) {
    }

    /**
     * @return Contribution[]
     */
    public function contributions(): array
    {
        return array_values(
            array_filter($this->values, function (Activity $value) {
                return $value instanceof Contribution;
            })
        );
    }

    /**
     * @return Reply[]
     */
    public function replies(): array
    {
        return array_values(
            array_filter($this->values, function (Activity $value) {
                return $value instanceof Reply;
            })
        );
    }

    /**
     * @return Share[]
     */
    public function shares(): array
    {
        return array_values(
            array_filter($this->values, function (Activity $value) {
                return $value instanceof Share;
            })
        );
    }

    public function count(): int
    {
        return count($this->values);
    }

    public function countOfContributions(): int
    {
        return count($this->contributions());
    }

    public function countOfReplies(): int
    {
        return count($this->replies());
    }

    public function countOfShares(): int
    {
        return count($this->shares());
    }

    /**
     * @return ContributionId[]
     */
    public function contributionIdsOfReplies(): array
    {
        return array_map(function (Reply $reply) {
            return $reply->repliedContributionId();
        }, $this->replies());
    }

    /**
     * @return ContributionId[]
     */
    public function contributionIdsOfShares(): array
    {
        return array_map(function (Share $share) {
            return $share->sharedContributionId();
        }, $this->shares());
    }

    /**
     * @return UserId[]
     */
    public function uniqueActivatorIds(): array
    {
        $activatorIds = [];
        foreach ($this->values as $value) {
            $activatorIds[$value->activatorId()->value()] = $value->activatorId();
        }
        return array_values($activatorIds);
    }
}
