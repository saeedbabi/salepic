<?php

namespace App\Models;

use App\Models\Contract\BaseModel;
use Illuminate\Database\Capsule\Manager as DB;

class Like extends BaseModel
{
    public static $table = 'likes';
    public function alreadyLike($entity_id, $entity_type, $ip = null)
    {
        return DB::table(static::$table)->where([
            'entity_type' => $entity_type,
            'entity_id' => $entity_id,
            'ip' => $ip,
        ])->count();
    }
}
