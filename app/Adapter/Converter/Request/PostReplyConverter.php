<?php

namespace App\Adapter\Converter\Request;

use App\Domain\Model\Entity\Activity\Reply;
use App\Domain\Model\ValueObject\Activity\Body;
use App\Domain\Model\ValueObject\Activity\ContributionId;
use App\Domain\Model\ValueObject\User\UserId;
use App\Domain\Service\UsecaseInput\PostReplyInput;
use DateTimeImmutable;

class PostReplyConverter extends RequestConverter implements PostReplyInput
{
    /** @var Reply $postedReply 新しく登録する返信 */
    private readonly Reply $postedReply;

    protected function execute(): void
    {
        $this->postedReply = new Reply(
            null,
            new DateTimeImmutable(),
            new UserId((string)$this->request->route("activatorId")),
            new ContributionId((string)$this->request->input("contributionId")),
            new Body((string)$this->request->input("body")),
        );
    }

    public function getPostedReply(): Reply
    {
        return $this->postedReply;
    }
}
