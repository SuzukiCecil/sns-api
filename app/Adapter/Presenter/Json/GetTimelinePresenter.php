<?php

namespace App\Adapter\Presenter\Json;

use App\Adapter\Presenter\ViewModel\Json\ContributionViewModel;
use App\Adapter\Presenter\ViewModel\Json\ReplyViewModel;
use App\Adapter\Presenter\ViewModel\Json\ShareViewModel;
use App\Domain\Model\Entity\Activity;
use App\Domain\Model\Entity\Contribution;
use App\Domain\Model\Entity\Reply;
use App\Domain\Model\Entity\Share;
use App\Domain\Service\UsecaseOutput\GetTimelineOutput;
use Illuminate\Http\JsonResponse;
use Exception;

class GetTimelinePresenter extends JsonPresenter
{
    /**
     * @param GetTimelineOutput $output
     * @return JsonResponse
     * @throws Exception
     */
    public function execute(GetTimelineOutput $output): JsonResponse
    {
        return $this->jsonResponse(
            array_map(function (Activity $activity) use ($output) {
                return match (true) {
                    $activity instanceof Contribution => new ContributionViewModel(
                        $activity,
                        $output->getActivator($activity->activatorId()),
                    ),
                    $activity instanceof Reply => new ReplyViewModel(
                        $activity,
                        $output->getActivator($activity->activatorId()),
                        $output->getContributionOfReplied($activity->repliedContributionId()),
                        $output->getActivator($output->getContributionOfReplied($activity->repliedContributionId())->activatorId()),
                    ),
                    $activity instanceof Share => new ShareViewModel(
                        $activity,
                        $output->getActivator($activity->activatorId()),
                        $output->getContributionOfShared($activity->sharedContributionId()),
                        $output->getActivator($output->getContributionOfShared($activity->sharedContributionId())->activatorId()),
                    ),
                    default => throw new Exception("Unexpected activity."),
                };
            }, $output->getActivities()->values)
        );
    }
}
