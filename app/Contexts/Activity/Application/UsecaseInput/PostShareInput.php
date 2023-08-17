<?php

namespace App\Contexts\Activity\Application\UsecaseInput;

use App\Contexts\Activity\Domain\Model\Entity\Share;

interface PostShareInput
{
    /**
     * 新しく登録するシェア
     * @return Share
     */
    public function getPostedShare(): Share;
}
