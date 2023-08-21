<?php

namespace App\Adapter\Presenter\ViewModel\Json\Activity;

use App\Adapter\Presenter\ViewModel\Json\JsonViewModel;
use App\Contexts\Activity\Domain\Model\Entity\Activator;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Share;

class ShareViewModel implements JsonViewModel
{
    private const ACTIVITY_KIND = "share";

    /**
     * @param Share $share シェア
     * @param Activator $activator シェアを行ったユーザーのID
     * @param Contribution $sharedContribution シェア対象の投稿
     * @param Activator $activatorOfSharedContribution シェア対象の投稿を行ったユーザーのID
     */
    public function __construct(
        private readonly Share $share,
        private readonly Activator $activator,
        private readonly Contribution $sharedContribution,
        private readonly Activator $activatorOfSharedContribution,
    ) {
    }

    public function toArray(): array
    {
        return [
            "activityKind" => self::ACTIVITY_KIND,
            "id" => $this->share->id()->value(),
            "datetime" => $this->share->datetime()->format("Y-m-d H:i:s"),
            "activatorId" => $this->share->activatorId()->value(),
            "activator" => new ActivatorViewModel(
                $this->activator,
            ),
            "sharedContribution" => new ContributionViewModel(
                $this->sharedContribution,
                $this->activatorOfSharedContribution,
            ),
        ];
    }
}
