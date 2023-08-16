<?php

namespace App\Domain\Service\Repository\Command;

use App\Domain\Model\Entity\Activity\Contribution;

interface ActivityCommand
{
    /**
     * 新しく投稿をデータストアに登録し、登録後の投稿を返却する関数
     * @param Contribution $contribution
     * @return Contribution
     */
    public function saveContribution(Contribution $contribution): Contribution;
}
