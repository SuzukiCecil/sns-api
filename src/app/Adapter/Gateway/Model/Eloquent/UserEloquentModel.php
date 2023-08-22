<?php

namespace App\Adapter\Gateway\Model\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 */
class UserEloquentModel extends Model
{
    protected $table = "user";
}
