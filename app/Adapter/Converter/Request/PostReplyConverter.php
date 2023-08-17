<?php

namespace App\Adapter\Converter\Request;

use App\Contexts\Activity\Application\UsecaseInput\PostReplyInput;
use App\Contexts\Activity\Domain\Model\Entity\Reply;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\Body;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;
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
            new ActivatorId((string)$this->request->route("activatorId")),
            new ContributionId((string)$this->request->input("contributionId")),
            new Body((string)$this->request->input("body")),
        );
    }

    public function getPostedReply(): Reply
    {
        return $this->postedReply;
    }
}
