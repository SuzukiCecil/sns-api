<?php

namespace App\Contexts\Activity\Domain\Service\Repository\Command;

use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Reply;
use App\Contexts\Activity\Domain\Model\Entity\Share;

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

    /**
     * 新しくシェアをデータストアに登録し、登録後のシェアを返却する関数
     * @param Reply $reply
     * @return Reply
     */
    public function saveReply(Reply $reply): Reply;
}
