<?php


namespace App\Controllers;

use App\Core\Request;
use App\Models\Photographer;
use App\Services\Auth\Auth;

class AuthController
{
    private $photographerModel;

    public function __construct()
    {
        $this->photographerModel = new Photographer;
    }


    public function register(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'mobile' => $request->mobile,
        );

        if ($request->userType == 'user') {
            $data['role'] = 'user';
            $id = Auth::register($data);
        } else {
            $data['role'] = 'photographer';
            $id = Auth::register($data);
        }

        Auth::login($data['email'], $data['password']);

        if (!$this->photographerModel->existUser($id)) {
            $this->photographerModel->create(['user_id' => $id]);
        }
    }



    public function login(Request $request)
    {
        $email = $request->user_email;
        $password = $request->user_pwd;
        Auth::login($email, $password);
    }



    public function isLogin()
    {
        Auth::isLogin();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        Request::redirect($request->referer);
    }
}
