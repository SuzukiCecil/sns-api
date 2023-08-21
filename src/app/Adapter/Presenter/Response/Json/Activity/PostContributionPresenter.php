<?php

namespace App\Adapter\Presenter\Response\Json\Activity;

use App\Adapter\Presenter\Response\Json\JsonPresenter;
use App\Adapter\Presenter\ViewModel\Json\Activity\ContributionViewModel;
use App\Contexts\Activity\Application\UsecaseOutput\PostContributionOutput;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Contribution登録APIのレスポンスを返却するPresenter
 */
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
