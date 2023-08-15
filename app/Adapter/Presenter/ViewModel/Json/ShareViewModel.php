<?php

namespace App\Adapter\Presenter\ViewModel\Json;

use App\Domain\Model\Entity\Contribution;
use App\Domain\Model\Entity\Share;
use App\Domain\Model\Entity\User;

class ShareViewModel implements JsonViewModel
{
    private const ACTIVITY_KIND = "share";

    /**
     * @param Share $share シェア
     * @param User|null $activator シェアを行ったユーザーのID
     * @param Contribution $sharedContribution シェア対象の投稿
     * @param User|null $activatorOfSharedContribution シェア対象の投稿を行ったユーザーのID
     */
    public function __construct(
        private readonly Share $share,
        private readonly ?User $activator,
        private readonly Contribution $sharedContribution,
        private readonly ?User $activatorOfSharedContribution,
    ) {
    }

    public function toArray(): array
    {
        return [
            "activityKind" => self::ACTIVITY_KIND,
            "id" => $this->share->id()->value(),
            "datetime" => $this->share->datetime()->format("Y-m-d H:i:s"),
            "activatorId" => $this->share->activatorId()->value(),
            "activator" => match (true) {
                !is_null($this->activator) => new UserViewModel($this->activator),
                default => null,
            },
            "sharedContribution" => new ContributionViewModel($this->sharedContribution, $this->activatorOfSharedContribution),
        ];
    }
}
