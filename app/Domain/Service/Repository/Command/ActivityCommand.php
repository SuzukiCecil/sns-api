<?php

namespace App\Domain\Service\Repository\Command;

use App\Domain\Model\Entity\Activity\Contribution;
use App\Domain\Model\Entity\Activity\Share;

interface ActivityCommand
{
    /**
     * 新しく投稿をデータストアに登録し、登録後の投稿を返却する関数
     * @param Contribution $contribution
     * @return Contribution
     */
    public function saveContribution(Contribution $contribution): Contribution;

    /**
     * 新しくシェアをデータストアに登録し、登録後のシェアを返却する関数
     * @param Share $share
     * @return Share
     */
    public function saveShare(Share $share): Share;
}
