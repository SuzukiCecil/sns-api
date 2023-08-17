<?php

namespace App\Contexts\Activity\Application\UsecaseInput;

use App\Contexts\Activity\Domain\Model\Entity\Contribution;

interface PostContributionInput
{
    /**
     * 新しく投稿するコントリビューション
     * @return Contribution
     */
    public function getPostedContribution(): Contribution;
}
