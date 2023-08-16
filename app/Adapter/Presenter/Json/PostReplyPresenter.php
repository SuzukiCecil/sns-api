<?php

namespace App\Adapter\Presenter\Json;

use App\Adapter\Presenter\ViewModel\Json\ReplyViewModel;
use App\Domain\Service\UsecaseOutput\PostReplyOutput;
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
