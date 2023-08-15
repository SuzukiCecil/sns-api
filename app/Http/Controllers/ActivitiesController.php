<?php

namespace App\Http\Controllers;

use App\Adapter\Converter\Request\GetActivitiesConverter;
use App\Adapter\Converter\Request\GetTimelineConverter;
use App\Adapter\Converter\Request\PostContributionConverter;
use App\Adapter\Converter\Request\PostReplyConverter;
use App\Adapter\Converter\Request\PostShareConverter;
use App\Adapter\Presenter\Json\GetActivitiesPresenter;
use App\Adapter\Presenter\Json\GetTimelinePresenter;
use App\Domain\Service\Usecase\GetActivitiesUsecase;
use App\Domain\Service\Usecase\GetTimelineUsecase;
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

    public function postContribution(PostContributionConverter $input): JsonResponse
    {
        // TODO：コントリビューション登録APIの実装
        return new JsonResponse();
    }

    public function postShare(PostShareConverter $input): JsonResponse
    {
        // TODO：シェア登録APIの実装
        return new JsonResponse();
    }

    public function postReply(PostReplyConverter $input): JsonResponse
    {
        // TODO：返信登録APIの実装
        return new JsonResponse();
    }
}
