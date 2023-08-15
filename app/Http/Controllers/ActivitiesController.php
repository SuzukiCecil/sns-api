<?php

namespace App\Http\Controllers;

use App\Adapter\Converter\Request\GetActivitiesConverter;
use Illuminate\Http\JsonResponse;

class ActivitiesController extends Controller
{
    public function getActivities(GetActivitiesConverter $input): JsonResponse
    {
        return new JsonResponse();
    }

    public function getTimeline(): JsonResponse
    {
        return new JsonResponse();
    }

    public function postContribution(): JsonResponse
    {
        return new JsonResponse();
    }

    public function postShare(): JsonResponse
    {
        return new JsonResponse();
    }

    public function postReply(): JsonResponse
    {
        return new JsonResponse();
    }
}
