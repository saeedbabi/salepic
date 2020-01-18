<?php

namespace App\Models;

use Illuminate\Database\Capsule\Manager as DB;
use App\Models\Contract\BaseModel;

class User extends BaseModel
{
    public static $table = 'users';
    public static $record_per_page = 10;

    public function alreadyExists($email)
    {
        return DB::table(static::$table)->where('email', $email)->first();
    }
}
