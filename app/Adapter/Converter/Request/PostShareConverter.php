<?php

namespace App\Adapter\Converter\Request;

use App\Domain\Model\Entity\Activity\Share;
use App\Domain\Model\ValueObject\Activity\ContributionId;
use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Service\UsecaseInput\PostShareInput;
use DateTimeImmutable;

class PostShareConverter extends RequestConverter implements PostShareInput
{
    /** @var Share $postedShare 新しく登録するシェア */
    private readonly Share $postedShare;
    protected function execute(): void
    {
        $this->postedShare = new Share(
            null,
            new DateTimeImmutable(),
            new UserId((string)$this->request->route("activatorId")),
            new ContributionId((string)$this->request->input("contributionId")),
        );
    }

    public function getPostedShare(): Share
    {
        return $this->postedShare;
    }
}
