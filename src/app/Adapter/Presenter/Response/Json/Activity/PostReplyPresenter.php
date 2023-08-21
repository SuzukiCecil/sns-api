<?php

namespace App\Adapter\Presenter\Response\Json\Activity;

use App\Adapter\Presenter\Response\Json\JsonPresenter;
use App\Adapter\Presenter\ViewModel\Json\Activity\ReplyViewModel;
use App\Contexts\Activity\Application\UsecaseOutput\PostReplyOutput;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Reply登録APIのレスポンスを返却するPresenter
 */
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
