<?php

namespace App\Controllers\Admin;

use App\Core\Request;
use App\Models\Category;
use App\Services\Validation\Validation;
use App\Services\View\View;

class CatController
{
    private $catModel;
    public function __construct()
    {
        $this->catModel = new Category;
    }


    public function ajaxSave(Request $request)
    {
        if (!$request->isAjax()) {
            echo "Invalid Request!";
            die();
        }

        $data = ['name' => $request->name, 'slug' => $request->slug];
        $pattern = ['name' => 'required|regex,/[ا-ی]/', 'slug' => 'required|alpha'];
        Validation::validator($data, $pattern);


        if (!$request->isAjax()) {
            echo "Invalid Request!";
            die();
        }

        $catAlreadyExist = $this->catModel->alreadyExists($request->slug);

        if ($catAlreadyExist) {
            echo "Category '$request->slug'Already Exist!";
            die();
        }


        $data = array('name' => $request->name, 'slug' => $request->slug);

        if ($this->catModel->create($data)) {
            echo "Category Created!";
        }
    }


    public function edit(Request $request)
    {
    }


    public function delete(Request $request)
    {
        if ($request->id) {
            $this->catModel->delete(['id' => $request->id]);
        }

        Request::redirect('admin');
    }
}
