<?php

namespace App\Http\Controllers;

use App\Adapter\Converter\Request\GetActivitiesConverter;
use App\Adapter\Converter\Request\GetTimelineConverter;
use App\Adapter\Converter\Request\PostContributionConverter;
use App\Adapter\Converter\Request\PostReplyConverter;
use App\Adapter\Converter\Request\PostShareConverter;
use App\Adapter\Presenter\Json\Activity\GetActivitiesPresenter;
use App\Adapter\Presenter\Json\Activity\GetTimelinePresenter;
use App\Adapter\Presenter\Json\Activity\PostContributionPresenter;
use App\Adapter\Presenter\Json\Activity\PostReplyPresenter;
use App\Adapter\Presenter\Json\Activity\PostSharePresenter;
use App\Contexts\Activity\Application\Usecase\GetActivitiesUsecase;
use App\Contexts\Activity\Application\Usecase\GetTimelineUsecase;
use App\Contexts\Activity\Application\Usecase\PostContributionUsecase;
use App\Contexts\Activity\Application\Usecase\PostReplyUsecase;
use App\Contexts\Activity\Application\Usecase\PostShareUsecase;
use Exception;
use Illuminate\Http\JsonResponse;

class ActivitiesController extends Controller
{
    /**
     * @param GetActivitiesConverter $input
     * @param GetActivitiesUsecase $usecase
     * @param GetActivitiesPresenter $presenter
     * @return JsonResponse
     * @throws Exception
     */
    public function getActivities(GetActivitiesConverter $input, GetActivitiesUsecase $usecase, GetActivitiesPresenter $presenter): JsonResponse
    {
        $output = $usecase->execute($input);
        return $presenter->execute($output);
    }

    /**
     * @param GetTimelineConverter $input
     * @param GetTimelineUsecase $usecase
     * @param GetTimelinePresenter $presenter
     * @return JsonResponse
     * @throws Exception
     */
    public function getTimeline(GetTimelineConverter $input, GetTimelineUsecase $usecase, GetTimelinePresenter $presenter): JsonResponse
    {
        $output = $usecase->execute($input);
        return $presenter->execute($output);
    }

    /**
     * @param PostContributionConverter $input
     * @param PostContributionUsecase $usecase
     * @param PostContributionPresenter $presenter
     * @return JsonResponse
     * @throws Exception
     */
    public function postContribution(PostContributionConverter $input, PostContributionUsecase $usecase, PostContributionPresenter $presenter): JsonResponse
    {
        $output = $usecase->execute($input);
        return $presenter->execute($output);
    }

    /**
     * @param PostShareConverter $input
     * @param PostShareUsecase $usecase
     * @param PostSharePresenter $presenter
     * @return JsonResponse
     * @throws Exception
     */
    public function postShare(PostShareConverter $input, PostShareUsecase $usecase, PostSharePresenter $presenter): JsonResponse
    {
        $output = $usecase->execute($input);
        return $presenter->execute($output);
    }

    /**
     * @param PostReplyConverter $input
     * @param PostReplyUsecase $usecase
     * @param PostReplyPresenter $presenter
     * @return JsonResponse
     * @throws Exception
     */
    public function postReply(PostReplyConverter $input, PostReplyUsecase $usecase, PostReplyPresenter $presenter): JsonResponse
    {
        $output = $usecase->execute($input);
        return $presenter->execute($output);
    }
}
