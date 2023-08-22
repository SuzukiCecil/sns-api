<?php

namespace App\Adapter\Gateway\Model\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $contribution_id
 * @property string $body
 * @property ActivityEloquentModel $activity
 */
class ReplyEloquentModel extends Model
{
    protected $table = "reply";

    public function activity(): HasOne
    {
        return $this->hasOne(ActivityEloquentModel::class, "child_id", "id")
            ->where("kind", "=", ActivityEloquentModel::KIND_REPLY);
    }
}
