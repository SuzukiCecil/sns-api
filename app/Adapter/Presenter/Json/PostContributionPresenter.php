<?php

namespace App\Adapter\Presenter\Json;

use App\Adapter\Presenter\ViewModel\Json\ContributionViewModel;
use App\Domain\Service\UsecaseOutput\PostContributionOutput;
use Illuminate\Http\JsonResponse;
use Exception;

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
