<?php

namespace App\Adapter\Presenter\Response\Json\Activity;

use App\Adapter\Presenter\Response\Json\JsonPresenter;
use App\Adapter\Presenter\ViewModel\Json\Activity\ContributionViewModel;
use App\Adapter\Presenter\ViewModel\Json\Activity\ReplyViewModel;
use App\Adapter\Presenter\ViewModel\Json\Activity\ShareViewModel;
use App\Contexts\Activity\Application\UsecaseOutput\GetTimelineOutput;
use App\Contexts\Activity\Domain\Model\Entity\Activity;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Reply;
use App\Contexts\Activity\Domain\Model\Entity\Share;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Timeline取得APIのレスポンスを返却するPresenter
 */
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
                        $output->getActivator(
                            $output->getContributionOfReplied($activity->repliedContributionId())->activatorId()
                        ),
                    ),
                    $activity instanceof Share => new ShareViewModel(
                        $activity,
                        $output->getActivator($activity->activatorId()),
                        $output->getContributionOfShared($activity->sharedContributionId()),
                        $output->getActivator(
                            $output->getContributionOfShared($activity->sharedContributionId())->activatorId()
                        ),
                    ),
                    default => throw new Exception("Unexpected activity."),
                };
            }, $output->getActivities()->values)
        );
    }
}
