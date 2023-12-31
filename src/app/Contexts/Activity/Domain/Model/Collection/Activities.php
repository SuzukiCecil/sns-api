<?php

namespace App\Contexts\Activity\Domain\Model\Collection;

use App\Contexts\Activity\Domain\Model\Entity\Activity;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Reply;
use App\Contexts\Activity\Domain\Model\Entity\Share;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;

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
        $contributions = [];
        foreach ($this->values as $value) {
            if ($value instanceof Contribution) {
                $contributions[] = $value;
            }
        }
        return $contributions;
    }

    /**
     * @return Reply[]
     */
    public function replies(): array
    {
        $replies = [];
        foreach ($this->values as $value) {
            if ($value instanceof Reply) {
                $replies[] = $value;
            }
        }
        return $replies;
    }

    /**
     * @return Share[]
     */
    public function shares(): array
    {
        $shares = [];
        foreach ($this->values as $value) {
            if ($value instanceof Share) {
                $shares[] = $value;
            }
        }
        return $shares;
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
     * @return ActivatorId[]
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
