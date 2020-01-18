<?php

namespace App\Models;

use App\Models\Contract\BaseModel;

class Image extends BaseModel
{
    public static $table = 'images';
    public static $record_per_page = 8;
}
