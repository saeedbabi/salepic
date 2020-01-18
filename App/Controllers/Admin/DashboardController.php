<?php

namespace App\Controllers\Admin;

use App\Services\View\View;
use App\Utilities\imageResize;
use App\Services\Auth\Auth;
use App\Core\Request;
use App\Models\Category;
use App\Models\User;

class DashboardController
{
    private $catModel;
    private $userModel;

    public function __construct()
    {
        $this->catModel = new Category();
        $this->userModel = new User();
    }

    public function index()
    {
        if (!Auth::isAdminUser()) {
            Request::redirect('');
        }
        $data = array(
            'users' => $this->userModel->readWithPaginate(
                ['id', 'name', 'email', 'picture'],
                ['role' => 'user']
            ),
            'shooters' => $this->userModel->readWithPaginate(
                ['id', 'name', 'email', 'picture'],
                ['role' => 'photographer']
            ),
            'categories' => $this->catModel->getAll(),

        );
        View::load_from_base('admin.index', $data, 'base-layout');
    }



    public function message(Request $request)
    {
        $sender = "1000596446";
        $receptor = "09364962308";
        $message = $request->message;
        $api = new \Kavenegar\KavenegarApi(SMS_API_KEY);
        if ($api->Send($sender, $receptor, $message)) {
            echo "پیام شما با موفقیت ارسال شد.";
        }
    }
}
