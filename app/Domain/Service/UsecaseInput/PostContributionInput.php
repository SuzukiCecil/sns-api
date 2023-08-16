<?php

namespace App\Domain\Service\UsecaseInput;

use App\Domain\Model\Entity\Activity\Contribution;

interface PostContributionInput
{
    /**
     * 新しく投稿するコントリビューション
     * @return Contribution
     */
    public function getPostedContribution(): Contribution;
}
