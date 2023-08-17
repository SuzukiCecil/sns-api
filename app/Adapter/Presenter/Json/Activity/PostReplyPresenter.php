<?php

namespace App\Adapter\Presenter\Json\Activity;

use App\Adapter\Presenter\Json\JsonPresenter;
use App\Adapter\Presenter\ViewModel\Json\Activity\ReplyViewModel;
use App\Contexts\Activity\Application\UsecaseOutput\PostReplyOutput;
use Exception;
use Illuminate\Http\JsonResponse;

class PostReplyPresenter extends JsonPresenter
{
    /**
     * @param PostReplyOutput $output
     * @return JsonResponse
     * @throws Exception
     */
    public function execute(PostReplyOutput $output): JsonResponse
    {
        return $this->jsonResponse(
            new ReplyViewModel(
                $output->getNewReply(),
                $output->getActivator(),
                $output->getRepliedContribution(),
                $output->getActivatorOfRepliedContribution(),
            ),
        );
    }
}
