<?php

namespace App\Controllers;

use  App\Services\Uploader\Files;
use App\Services\Uploader\FileUploader;
use App\Services\Uploader\FileValidator;
use App\Services\Auth\Auth;
use App\Core\Request;
use App\Models\Category;
use App\Models\Image;
use App\Models\Like;
use App\Models\User;
use App\Services\Validation\Validation;
use App\Utilities\FlashMessage;
use App\Services\View\View;

class ImageController
{
    private $imgModel;
    private $photgrapherModel;
    private $categoryModel;
    private $likeModel;

    public function __construct()
    {
        $this->imgModel = new Image();
        $this->photgrapherModel = new User();
        $this->categoryModel = new Category();
        $this->likeModel = new Like();
    }




    public function image(Request $request)
    {
        $image = $this->imgModel->read(['*'], ['id' => $request->id]);
        $photgrapher = $this->photgrapherModel->read(
            ['name', 'picture'],
            ['id' => $image[0]->photographer_id]
        );
        $data = array(
            'image' => $image,
            'shooter' => $photgrapher,
            'alreadyLikes' => $this->likeModel->alreadyLike($request->id, 'image', $request->ip),
        );
        View::load('images.image', $data, 'base-layout');
    }




    public function search(Request $request)
    {
        if (!$request->k) {
            Request::redirect($request->referer);
        }
        $data = ['keyword' => $request->k];
        $pattern = ['keyword' => 'regex,/[ا-یa-zA-Z0-9]/'];
        $keyword = Validation::validator($data, $pattern);
        // dd(is_bool($keyword));
        $where = [];

        if (!is_bool($keyword)) {
            Request::redirect('');
        }

        $where = ['title' => $request->k];

        $user_table = $this->photgrapherModel::$table;
        $img_table = $this->imgModel::$table;
        $images = $this->imgModel->joinWithPaginate(
            $user_table,
            "$img_table.photographer_id",
            "$user_table.id",
            [
                "$img_table.id", "$img_table.link", "$img_table.view_count",
                "$user_table.name", "$user_table.picture",
            ],
            $where
        );

        $data = array(
            'images' => $images,
            'categories' => $this->categoryModel->getAll(),
        );

        View::load('images.search', $data, 'base-layout');
    }




    public function upload(Request $request)
    {

        $file = new Files('upload-file');
        $validator = new FileValidator();
        $file_uploader = new FileUploader($validator, $file);
        $file_url = $file_uploader->upload();


        //echo gettype((int) $request->price);
        if (!$file_url) {
            $file_uploader->destroy();
            FlashMessage::add("خطا در آپلود تصویر", FlashMessage::ERROR);
        }


        $data = array(
            'title' => $request->title,
            'name' => $file->name(),
            'size' => $file->size(),
            'is_free' => ($request->price) ? 0 : 1,
            'photographer_id' => Auth::isLogin(),
            'category_id' => $request->category,
            'description' => $request->description,
            'price' => (int) $request->price ?? 0,
            'link' =>   $file_url,
        );


        $pattern = array(
            'title' => 'required|regex,/[ا-یa-zA-Z0-9]/',
            'name' => 'required|regex,/[a-zA-Z0-9!@#$%&*]/',
            'size' => 'required|numeric',
            'is_free' => 'numeric|exact_len,1',
            'photographer_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'description' => 'regex,/[ا-یa-zA-Z0-9]/',
            'price' => 'numeric',
            'link' =>  'required|valid_url'
        );

        if (is_bool(Validation::validator($data, $pattern))) {
            $this->imgModel->create($data);
            FlashMessage::add("تصویر آپلود شد!", FlashMessage::SUCCESS);
            Request::redirect('profile/user');
        }
    }
}
