<?php

namespace App\Models;

use App\Models\Contract\BaseModel;
use Illuminate\Database\Capsule\Manager as DB;

class Category extends BaseModel
{
    public static $table = 'categories';
    public function alreadyExists($slug)
    {
        return DB::table(static::$table)->where('slug', $slug)->count();
    }
}
