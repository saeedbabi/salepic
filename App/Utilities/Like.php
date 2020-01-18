<?php

namespace App\Utilities;

use App\Core\Request;
use App\Models\Like as AppLike;

class Like
{
    public static function ipAlreadyLikes($entity, $id)
    {
        $model = new AppLike;
        $req = new Request;
        $count = $model->count([
            'entity_type' => $entity,
            'entity_id' => $id,
            'ip' => $req->ip
        ]);
        return $count;
    }
}
