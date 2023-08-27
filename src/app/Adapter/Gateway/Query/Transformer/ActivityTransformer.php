<?php

namespace App\Adapter\Gateway\Query\Transformer;

use App\Adapter\Gateway\Exception\InvalidDataException;
use App\Adapter\Gateway\Model\Eloquent\ActivityEloquentModel;
use App\Adapter\Gateway\Model\Eloquent\ContributionEloquentModel;
use App\Adapter\Gateway\Model\Eloquent\ReplyEloquentModel;
use App\Adapter\Gateway\Model\Eloquent\ShareEloquentModel;
use App\Contexts\Activity\Domain\Model\Entity\Activity;
use App\Contexts\Activity\Domain\Model\Entity\Contribution;
use App\Contexts\Activity\Domain\Model\Entity\Reply;
use App\Contexts\Activity\Domain\Model\Entity\Share;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivatorId;
use App\Contexts\Activity\Domain\Model\ValueObject\ActivityId;
use App\Contexts\Activity\Domain\Model\ValueObject\Body;
use App\Contexts\Activity\Domain\Model\ValueObject\ContributionId;
use DateTimeImmutable;
use Exception;

class ActivityTransformer
{
    /**
     * @param ActivityEloquentModel $activityEloquentModel
     * @param ContributionEloquentModel|null $contributionEloquentModel
     * @param ShareEloquentModel|null $shareEloquentModel
     * @param ReplyEloquentModel|null $replyEloquentModel
     * @return Activity
     * @throws InvalidDataException
     */
    public function toActivity(
        ActivityEloquentModel $activityEloquentModel,
        ?ContributionEloquentModel $contributionEloquentModel,
        ?ShareEloquentModel $shareEloquentModel,
        ?ReplyEloquentModel $replyEloquentModel,
    ): Activity {
        return match ($activityEloquentModel->kind) {
            ActivityEloquentModel::KIND_CONTRIBUTION => $this->toContribution(
                $activityEloquentModel,
                $contributionEloquentModel,
            ),
            ActivityEloquentModel::KIND_SHARE => $this->toShare(
                $activityEloquentModel,
                $shareEloquentModel,
            ),
            ActivityEloquentModel::KIND_REPLY => $this->toReply(
                $activityEloquentModel,
                $replyEloquentModel,
            ),
            default => throw new InvalidDataException(""),
        };
    }

    /**
     * @param ActivityEloquentModel $activityEloquentModel
     * @param ContributionEloquentModel|null $contributionEloquentModel
     * @return Contribution
     * @throws InvalidDataException
     */
    public function toContribution(
        ActivityEloquentModel $activityEloquentModel,
        ?ContributionEloquentModel $contributionEloquentModel,
    ): Contribution {
        try {
            return new Contribution(
                new ActivityId((string)$activityEloquentModel->id),
                new DateTimeImmutable($activityEloquentModel->activation_datetime),
                new ActivatorId((string)$activityEloquentModel->activator),
                new Body($contributionEloquentModel->body),
            );
        } catch (Exception $e) {
            throw new InvalidDataException(
                message: "activityEloquentModel:" .
                $activityEloquentModel->toJson() .
                "contributionEloquentModel:" .
                $contributionEloquentModel->toJson(),
                previous: $e,
            );
        }
    }

    /**
     * @param ActivityEloquentModel $activityEloquentModel
     * @param ShareEloquentModel|null $shareEloquentModel
     * @return Share
     * @throws InvalidDataException
     */
    public function toShare(
        ActivityEloquentModel $activityEloquentModel,
        ?ShareEloquentModel $shareEloquentModel,
    ): Share {
        try {
            return new Share(
                new ActivityId((string)$activityEloquentModel->id),
                new DateTimeImmutable($activityEloquentModel->activation_datetime),
                new ActivatorId((string)$activityEloquentModel->activator),
                new ContributionId((string)$shareEloquentModel->contribution_id),
            );
        } catch (Exception $e) {
            throw new InvalidDataException(
                message: "activityEloquentModel:" . $activityEloquentModel->toJson() .
                "shareEloquentModel:" . $shareEloquentModel->toJson(),
                previous: $e,
            );
        }
    }

    /**
     * @param ActivityEloquentModel $activityEloquentModel
     * @param ReplyEloquentModel|null $replyEloquentModel
     * @return Reply
     * @throws InvalidDataException
     */
    public function toReply(
        ActivityEloquentModel $activityEloquentModel,
        ?ReplyEloquentModel $replyEloquentModel,
    ): Reply {
        try {
            return new Reply(
                new ActivityId((string)$activityEloquentModel->id),
                new DateTimeImmutable($activityEloquentModel->activation_datetime),
                new ActivatorId((string)$activityEloquentModel->activator),
                new ContributionId((string)$replyEloquentModel->contribution_id),
                new Body($replyEloquentModel->body),
            );
        } catch (Exception $e) {
            throw new InvalidDataException(
                message: "activityEloquentModel:" .
                $activityEloquentModel->toJson() .
                "shareEloquentModel:" .
                $replyEloquentModel->toJson(),
                previous: $e,
            );
        }
    }
}
