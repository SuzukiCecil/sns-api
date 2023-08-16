<?php

namespace App\Domain\Service\UsecaseInput;

use App\Domain\Model\Entity\Activity\Share;

interface PostShareInput
{
    /**
     * 新しく登録するシェア
     * @return Share
     */
    public function getPostedShare(): Share;
}
