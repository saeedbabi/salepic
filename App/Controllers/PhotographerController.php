<?php

namespace App\Controllers;


use App\Core\Request;
use App\Models\Image;
use App\Models\Photographer;
use App\Models\User;
use App\Services\View\View;



class PhotographerController
{
    private $userModel;
    private $imgModel;
    private $photographerModel;
    public function __construct()
    {
        $this->userModel = new User;
        $this->imgModel = new Image;
        $this->photographerModel = new Photographer;
    }


    public function public(Request $request)
    {
        if (!$request->id) {
            return false;
        }

        $info = $this->userModel->read(['id', 'name', 'picture'], ['id' => $request->id]);
        $images = $this->imgModel->readWithPaginate(['id', 'link'], ['photographer_id' => $request->id]);
        $introduce = $this->photographerModel->read('introduce', ['user_id' => $request->id]);
        $data = array(
            'info' => $info,
            'images' => $images,
            'introduce' => $introduce,
        );
        View::load('profiles.public', $data, 'base-layout');
    }


    public function ajaxSearch(Request $request)
    {
        if (!$request->keyword) {
            return false;
        }
        $image_names = $this->imgModel->read(['title'], ['photographer_id' => $request->id]);
        $i = 0;
        foreach ($image_names as $key => $image) {
            if ($i < 5 && strpos($image->title, $request->keyword) !== false) {
                $str = str_replace($request->keyword,  $request->keyword, $image->title) . "<br>";
                echo "<li style='line-height:35px;list-style-type: none;'>" . $str . "</li>";
                $i++;
            }
        }
    }
}
