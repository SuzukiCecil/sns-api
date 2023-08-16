<?php

namespace App\Domain\Service\UsecaseInput;

use App\Domain\Model\Entity\Activity\Reply;

interface PostReplyInput
{
    /**
     * 新しく登録する返信
     * @return Reply
     */
    public function getPostedReply(): Reply;
}
