<?php

namespace App\Adapter\Presenter\Json;

use App\Adapter\Presenter\ViewModel\Json\ContributionViewModel;
use App\Adapter\Presenter\ViewModel\Json\ReplyViewModel;
use App\Adapter\Presenter\ViewModel\Json\ShareViewModel;
use App\Domain\Model\Entity\Activity;
use App\Domain\Model\Entity\Contribution;
use App\Domain\Model\Entity\Reply;
use App\Domain\Model\Entity\Share;
use App\Domain\Service\UsecaseOutput\GetActivitiesOutput;
use Illuminate\Http\JsonResponse;
use Exception;

class GetActivitiesPresenter extends JsonPresenter
{
    /**
     * @param GetActivitiesOutput $output
     * @return JsonResponse
     * @throws Exception
     */
    public function execute(GetActivitiesOutput $output): JsonResponse
    {
        return $this->jsonResponse(
            array_map(function (Activity $activity) use ($output) {
                return match (true) {
                    $activity instanceof Contribution => new ContributionViewModel($activity, null),
                    $activity instanceof Reply => new ReplyViewModel($activity, null, $output->getContributionOfReplied($activity->repliedContributionId()), null),
                    $activity instanceof Share => new ShareViewModel($activity, null, $output->getContributionOfShared($activity->sharedContributionId()), null),
                    default => throw new Exception("Unexpected activity."),
                };
            }, $output->getActivities()->values)
        );
    }
}
