<?php

namespace App\Http\Controllers;

use App\Adapter\Converter\Request\GetActivitiesConverter;
use App\Adapter\Converter\Request\GetTimelineConverter;
use App\Adapter\Converter\Request\PostContributionConverter;
use App\Adapter\Converter\Request\PostReplyConverter;
use App\Adapter\Converter\Request\PostShareConverter;
use Illuminate\Http\JsonResponse;

class ActivitiesController extends Controller
{
    public function getActivities(GetActivitiesConverter $input): JsonResponse
    {
        return new JsonResponse();
    }

    public function getTimeline(GetTimelineConverter $input): JsonResponse
    {
        return new JsonResponse();
    }

    public function postContribution(PostContributionConverter $input): JsonResponse
    {
        return new JsonResponse();
    }

    public function postShare(PostShareConverter $input): JsonResponse
    {
        return new JsonResponse();
    }

    public function postReply(PostReplyConverter $input): JsonResponse
    {
        return new JsonResponse();
    }
}
