<?php

namespace App\Adapter\Gateway\Command\Transformer;

use App\Adapter\Gateway\Model\Eloquent\ActivityEloquentModel;
use App\Contexts\Activity\Domain\Model\Entity\Activity;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Reply;
use App\Contexts\Activity\Domain\Model\Entity\Share;
use Exception;

class ActivityTransformer
{
    public function toActivity(
        Activity $activity,
        int $childId,
        bool $isCreate = true,
    ): array {
        $values = [
            "id" => $isCreate ? null : $activity->id()->value(),
            "kind" => match (true) {
                $activity instanceof Contribution => ActivityEloquentModel::KIND_CONTRIBUTION,
                $activity instanceof Share => ActivityEloquentModel::KIND_SHARE,
                $activity instanceof Reply => ActivityEloquentModel::KIND_REPLY,
                default => throw new Exception("Unexpected activity."),
            },
            "child_id" => $childId,
            "activator" => $activity->activatorId()->value(),
        ];
        if ($isCreate) {
            $values["activation_datetime"] = date("Y-m-d H:i:s");
        }
        return $values;
    }

    public function toContribution(
        Contribution $contribution,
        bool $isCreate = true,
    ): array {
        return [
            "id" => $isCreate ? null : $contribution->id()->value(),
            "body" => $contribution->body()->value(),
        ];
    }

    public function toShare(
        Share $share,
        bool $isCreate = true,
    ): array {
        return [
            "id" => $isCreate ? null : $share->id()->value(),
            "contribution_id" => $share->sharedContributionId()->value(),
        ];
    }

    public function toReply(
        Reply $reply,
        bool $isCreate = true,
    ): array {
        return [
            "id" => $isCreate ? null : $reply->id()->value(),
            "contribution_id" => $reply->repliedContributionId()->value(),
            "body" => $reply->body()->value(),
        ];
    }
}
