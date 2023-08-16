<?php

namespace App\Adapter\Presenter\Json;

use App\Adapter\Presenter\ViewModel\Json\ShareViewModel;
use App\Domain\Service\UsecaseOutput\PostShareOutput;
use Illuminate\Http\JsonResponse;
use Exception;

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
