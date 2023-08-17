<?php

namespace App\Adapter\Presenter\Json\Activity;

use App\Adapter\Presenter\Json\JsonPresenter;
use App\Adapter\Presenter\ViewModel\Json\Activity\ShareViewModel;
use App\Contexts\Activity\Application\UsecaseOutput\PostShareOutput;
use Exception;
use Illuminate\Http\JsonResponse;

class PostSharePresenter extends JsonPresenter
{
    /**
     * @param PostShareOutput $output
     * @return JsonResponse
     * @throws Exception
     */
    public function execute(PostShareOutput $output): JsonResponse
    {
        return $this->jsonResponse(
            new ShareViewModel(
                $output->getNewShare(),
                $output->getActivator(),
                $output->getSharedContribution(),
                $output->getActivatorOfSharedContribution(),
            )
        );
    }
}
