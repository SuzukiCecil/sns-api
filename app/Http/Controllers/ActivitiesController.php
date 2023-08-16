<?php

namespace App\Http\Controllers;

use App\Adapter\Converter\Request\GetActivitiesConverter;
use App\Adapter\Converter\Request\GetTimelineConverter;
use App\Adapter\Converter\Request\PostContributionConverter;
use App\Adapter\Converter\Request\PostReplyConverter;
use App\Adapter\Converter\Request\PostShareConverter;
use App\Adapter\Presenter\Json\GetActivitiesPresenter;
use App\Adapter\Presenter\Json\GetTimelinePresenter;
use App\Adapter\Presenter\Json\PostContributionPresenter;
use App\Adapter\Presenter\Json\PostReplyPresenter;
use App\Adapter\Presenter\Json\PostSharePresenter;
use App\Domain\Service\Usecase\GetActivitiesUsecase;
use App\Domain\Service\Usecase\GetTimelineUsecase;
use App\Domain\Service\Usecase\PostContributionUsecase;
use App\Domain\Service\Usecase\PostReplyUsecase;
use App\Domain\Service\Usecase\PostShareUsecase;
use Illuminate\Http\JsonResponse;
use Exception;

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
