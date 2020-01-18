<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\View;

class ViewController
{
    private $viewModel;
    public function __construct()
    {
        $this->viewModel = new View();
    }

    public function add(Request $request)
    {
        //TODO: validate request here

        $data = [
            'entity_id' => $request->id,
            'ip' => $request->ip,
        ];
        $where = [
            'entity_id' => $request->id,
        ];
        $alreadyExist = $this->viewModel->count($data);
        if (!$alreadyExist) {
            $this->viewModel->create($data);
        }
        $entityModelClass = "\\App\\Models\\" . ucfirst($request->entity);
        $entityModel = new $entityModelClass;
        $entityModel->update(['view_count' => $this->viewModel->count($where)], ['id' => $request->id]);
        echo json_encode($request->id);
    }
}
