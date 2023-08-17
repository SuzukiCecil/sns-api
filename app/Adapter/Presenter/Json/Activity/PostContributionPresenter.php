<?php

namespace App\Adapter\Presenter\Json\Activity;

use App\Adapter\Presenter\Json\JsonPresenter;
use App\Adapter\Presenter\ViewModel\Json\Activity\ContributionViewModel;
use App\Contexts\Activity\Application\UsecaseOutput\PostContributionOutput;
use Exception;
use Illuminate\Http\JsonResponse;

class PostContributionPresenter extends JsonPresenter
{
    /**
     * @param PostContributionOutput $output
     * @return JsonResponse
     * @throws Exception
     */
    public function execute(PostContributionOutput $output): JsonResponse
    {
        return $this->jsonResponse(
            new ContributionViewModel($output->getNewContribution(), $output->getActivator()),
        );
    }
}
