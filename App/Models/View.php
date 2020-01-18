<?php

namespace App\Models;

use App\Models\Contract\BaseModel;
use Illuminate\Database\Capsule\Manager as DB;

class View extends BaseModel
{
    public static $table = 'views';
    public function alreadyView($entity_id, $ip = null)
    {
        return DB::table(static::$table)->where([
            'entity_id' => $entity_id,
            'ip' => $ip,
        ])->count();
    }
}
