<?php

namespace App\Adapter\Gateway\Model\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $body
 * @property ActivityEloquentModel $activity
 */
class ContributionEloquentModel extends Model
{
    protected $table = "contribution";

    public function activity(): HasOne
    {
        return $this->hasOne(ActivityEloquentModel::class, "child_id", "id")
            ->where("kind", "=", ActivityEloquentModel::KIND_CONTRIBUTION);
    }
}
