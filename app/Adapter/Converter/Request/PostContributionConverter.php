<?php

namespace App\Adapter\Converter\Request;

use App\Domain\Model\Entity\Activity\Contribution;
use App\Domain\Model\ValueObject\Activity\Body;
use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Service\UsecaseInput\PostContributionInput;
use DateTimeImmutable;

class PostContributionConverter extends RequestConverter implements PostContributionInput
{
    /** @var Contribution $postedContribution 新しく投稿するコントリビューション */
    private readonly Contribution $postedContribution;

    protected function execute(): void
    {
        $this->postedContribution = new Contribution(
            null,
            new DateTimeImmutable(),
            new UserId((string)$this->request->route("activatorId")),
            new Body((string)$this->request->input("body")),
        );
    }

    public function getPostedContribution(): Contribution
    {
        return $this->postedContribution;
    }
}
