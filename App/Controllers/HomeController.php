<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Category;
use App\Models\Image;
use App\Models\Photographer;
use App\Models\User;
use App\Services\View\View;

class HomeController
{
    private $userModel;
    private $photgrapherModel;
    private $categoryModel;
    private $imgModel;
    public function __construct()
    {
        $this->userModel = new User;
        $this->photgrapherModel = new Photographer;
        $this->categoryModel = new Category;
        $this->imgModel = new Image();
    }

    public function index()
    {
        $shooter_ids = $this->photgrapherModel->readIn('user_id', 'rank', [1, 2, 3]);
        $ids = [$shooter_ids[0]->user_id, $shooter_ids[1]->user_id, $shooter_ids[2]->user_id];
        $best_shutter = $this->userModel->readIn(['id', 'name', 'picture'], 'id', $ids);
        $data = array(
            'best_shutter' => $best_shutter,
            'categories' => $this->categoryModel->getAll(),
        );
        View::load('index', $data, 'base-layout');
    }

    public function ajaxSearch(Request $request)
    {
        if ($request->k) {
            $image_names = $this->imgModel->distinct('title');
            //var_dump($searchs);
            $i = 0;
            foreach ($image_names as $key => $image) {
                // var_dump($search);
                if ($i < 5 && strpos($image->title, $request->k) !== false) {
                    $str = str_replace($request->k, $request->k, $image->title) . "<br>";
                    echo "<li style='line-height:35px;list-style-type: none;'>" . $str . "</li>";
                    $i++;
                }
            }
        }
    }




    public function contact()
    {
        $data = array();
        View::load('contact', $data, 'base-layout');
    }




    public function about()
    {
        $data = array();
        View::load('about', $data, 'base-layout');
    }


    public function forgetPass()
    {
        $data = array();
        View::load('forgetPass', $data, 'base-layout');
    }
}
