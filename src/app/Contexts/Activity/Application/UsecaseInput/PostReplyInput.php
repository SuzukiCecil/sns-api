<?php

namespace App\Contexts\Activity\Application\UsecaseInput;

use App\Contexts\Activity\Domain\Model\Entity\Reply;

interface PostReplyInput
{
    /**
     * 新しく登録する返信
     * @return Reply
     */
    public function getPostedReply(): Reply;
}
