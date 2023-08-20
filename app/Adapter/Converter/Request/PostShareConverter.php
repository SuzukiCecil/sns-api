<?php

namespace App\Adapter\Converter\Request;

use App\Contexts\Activity\Application\UsecaseInput\PostShareInput;
use App\Contexts\Activity\Domain\Model\Entity\Share;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;
use DateTimeImmutable;

class PostShareConverter extends RequestConverter implements PostShareInput
{
    /** @var Share $postedShare 新しく登録するシェア */
    private Share $postedShare;
    protected function execute(): void
    {
        $this->postedShare = new Share(
            null,
            new DateTimeImmutable(),
            new ActivatorId((string)$this->request->route("activatorId")),
            new ContributionId((string)$this->request->input("contributionId")),
        );
    }

    public function getPostedShare(): Share
    {
        return $this->postedShare;
    }
}
