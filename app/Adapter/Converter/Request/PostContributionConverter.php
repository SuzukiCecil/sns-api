<?php

namespace App\Adapter\Converter\Request;

use App\Contexts\Activity\Application\UsecaseInput\PostContributionInput;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\Body;
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
            new ActivatorId((string)$this->request->route("activatorId")),
            new Body((string)$this->request->input("body")),
        );
    }

    public function getPostedContribution(): Contribution
    {
        return $this->postedContribution;
    }
}
