<?php

namespace App\Adapter\Presenter\Response\Json\Activity;

use App\Adapter\Presenter\Response\Json\JsonPresenter;
use App\Adapter\Presenter\ViewModel\Json\Activity\ShareViewModel;
use App\Contexts\Activity\Application\UsecaseOutput\PostShareOutput;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Share登録APIのレスポンスを返却するPresenter
 */
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
