<?php

namespace App\Controllers\Admin;

use App\Services\View\View;
use App\Services\Auth\Auth;
use App\Core\Request;
use App\Models\User;
use App\Services\Validation\Validation;

class UserController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }


    public function message(Request $request)
    {
        $data = ['message' => $request->message];
        $pattern = ['message' => 'required|regex,/[ا-ی]/|max_len,50'];
        if (is_bool(Validation::validator($data, $pattern))) {
            $sender = "1000596446";
            $receptor = "09364962308";
            $message = $request->message;
            $api = new \Kavenegar\KavenegarApi(SMS_API_KEY);
            if ($api->Send($sender, $receptor, $message)) {
                echo "پیام شما با موفقیت ارسال شد.";
            }
        }
    }



    public function delete(Request $request)
    {
        if (is_bool(Validation::validator(['id' => $request->id], ['id' => 'numeric']))) {
            $this->userModel->delete(['id' => $request->id]);
        }
        Request::redirect('admin');
    }
}
