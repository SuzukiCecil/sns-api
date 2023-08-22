<?php

namespace App\Adapter\Gateway\Model\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $kind
 * @property int $child_id
 * @property string $activation_datetime
 * @property int $activator
 */
class ActivityEloquentModel extends Model
{
    protected $table = "activity";

    public const KIND_CONTRIBUTION = 1;
    public const KIND_SHARE = 2;
    public const KIND_REPLY = 3;

    protected static function boot()
    {
        parent::boot();
        self::addGlobalScope('order', function (Builder $builder) {
            $builder->orderByDesc('activation_datetime');
        });
    }

    public function isContribution(): bool
    {
        return $this->kind === self::KIND_CONTRIBUTION;
    }

    public function isShare(): bool
    {
        return $this->kind === self::KIND_SHARE;
    }

    public function isReply(): bool
    {
        return $this->kind === self::KIND_REPLY;
    }
}
