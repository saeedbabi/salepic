<?php

namespace App\Models;

use Illuminate\Database\Capsule\Manager as DB;
use App\Models\Contract\BaseModel;

class Photographer extends BaseModel
{
    public static $table = 'photographers';
    public static $record_per_page = 3;

    public function existUser($id)
    {
        return DB::table(static::$table)->where('user_id', $id)->first();
    }
}
