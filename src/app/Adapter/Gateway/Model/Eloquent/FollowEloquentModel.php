<?php

namespace App\Adapter\Gateway\Model\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $followee_id
 * @property int $follower_id
 */
class FollowEloquentModel extends Model
{
    protected $table = "follow";
}
