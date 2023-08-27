<?php

namespace App\Adapter\Gateway\Command;

use App\Adapter\Gateway\Command\Transformer\ActivityTransformer;
use App\Adapter\Gateway\Model\Eloquent\ActivityEloquentModel;
use App\Adapter\Gateway\Model\Eloquent\ContributionEloquentModel;
use App\Adapter\Gateway\Model\Eloquent\ShareEloquentModel;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Reply;
use App\Contexts\Activity\Domain\Model\Entity\Share;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivityId;
use App\Contexts\Activity\Domain\Service\Repository\Command\ActivityCommand;
use Illuminate\Support\Facades\DB;
use Throwable;

class ActivityCommandGateway implements ActivityCommand
{
    public function __construct(
        private readonly ActivityTransformer $activityTransformer,
    ) {
    }

    public function saveContribution(Contribution $contribution): Contribution
    {
        try {
            DB::beginTransaction();
            $childId = ContributionEloquentModel::query()
                ->insertGetId(
                    $this->activityTransformer->toContribution($contribution)
                );
            $id = ActivityEloquentModel::query()
                ->insertGetId(
                    $this->activityTransformer->toActivity($contribution, $childId),
                );

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return new Contribution(
            new ActivityId((string)$id),
            $contribution->datetime(),
            $contribution->activatorId(),
            $contribution->body(),
        );
    }

    public function saveShare(Share $share): Share
    {
        try {
            DB::beginTransaction();
            $childId = ShareEloquentModel::query()
                ->insertGetId(
                    $this->activityTransformer->toShare($share)
                );
            $id = ActivityEloquentModel::query()
                ->insertGetId(
                    $this->activityTransformer->toActivity($share, $childId),
                );

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return new Share(
            new ActivityId((string)$id),
            $share->datetime(),
            $share->activatorId(),
            $share->sharedContributionId(),
        );
    }

    public function saveReply(Reply $reply): Reply
    {
        try {
            DB::beginTransaction();
            $childId = ShareEloquentModel::query()
                ->insertGetId(
                    $this->activityTransformer->toReply($reply)
                );
            $id = ActivityEloquentModel::query()
                ->insertGetId(
                    $this->activityTransformer->toActivity($reply, $childId),
                );

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return new Reply(
            new ActivityId((string)$id),
            $reply->datetime(),
            $reply->activatorId(),
            $reply->repliedContributionId(),
            $reply->body(),
        );
    }
}
