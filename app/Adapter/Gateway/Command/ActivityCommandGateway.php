<?php

namespace App\Adapter\Gateway\Command;

use App\Domain\Model\Entity\Activity\Contribution;
use App\Domain\Model\ValueObject\Activity\ContributionId;
use App\Domain\Service\Repository\Command\ActivityCommand;

class ActivityCommandGateway implements ActivityCommand
{
    public function saveContribution(Contribution $contribution): Contribution
    {
        // TODO：データストアへの永続化処理
        return new Contribution(
            new ContributionId("123"),
            $contribution->datetime(),
            $contribution->activatorId(),
            $contribution->body(),
        );
    }
}
