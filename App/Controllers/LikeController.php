<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Like;
use App\Services\Validation\Validation;

class LikeController
{
    private $likeModel;
    public function __construct()
    {
        $this->likeModel = new Like;
    }

    public function add(Request $request)
    {
        //TODO: validate request here
        $data = [
            'entity_type' => $request->entity,
            'entity_id' => $request->id,
            'ip' => $request->ip,
        ];
        $pattern = array(
            'entity_type' => 'required|alpha',
            'entity_id' => 'required|numeric',
            'ip' => 'required|valid_ip',
        );
        Validation::validator($data, $pattern);
        $where = [
            'entity_type' => $request->entity,
            'entity_id' => $request->id,
        ];
        Validation::validator($where, $pattern);
        $alreadyExist = $this->likeModel->count($data);
        $result = array();

        $result['status'] = 'exist';
        if (!$alreadyExist) {
            if ($this->likeModel->create($data)) {
                $result['status'] = 'created';
            } else {
                $result['status'] = 'error';
            }
        }
        $result['count'] = $this->likeModel->count($where);
        $entityModelClass = "\\App\\Models\\" . ucfirst($request->entity);
        $entityModel = new $entityModelClass;
        //dd($entityModel);
        $entityModel->update(['likes' => $result['count']], ['id' => $request->id]);
        echo json_encode($result);
    }
}
