<?php

namespace App\Controllers;

use  App\Services\Uploader\Files;
use App\Services\Uploader\FileUploader;
use App\Services\Uploader\FileValidator;
use App\Core\Request;
use App\Models\Category;
use App\Models\User;
use App\Services\View\View;
use App\Utilities\FlashMessage;
use App\Services\Auth\Auth;
use App\Models\Image;
use App\Models\Photographer;
use App\Services\Email\Email;
use App\Services\Validation\Validation;

class UserController
{
    private $userModel;
    private $imgModel;
    private $photographerModel;
    private $categoryModel;

    public function __construct()
    {
        $this->userModel = new User;
        $this->imgModel = new Image;
        $this->photographerModel = new Photographer;
        $this->categoryModel = new Category;
    }




    public function user()
    {
        if (!Auth::isLogin()) {
            Request::redirect('');
        }
        $data = array(
            'userinfo' => $this->userModel->read(
                ['name', 'email', 'mobile', 'gender', 'picture', 'role'],
                ['id' => Auth::isLogin()]
            )
        );
        //dd($data['userinfo'][0]);
        if ($data['userinfo'][0]->role == 'user') {
            View::load('profiles.user', $data, 'base-layout');
        }

        if ($data['userinfo'][0]->role == 'photographer') {
            $data['images'] = $this->imgModel->readWithPaginate(['*'], ['photographer_id' => Auth::isLogin()]);
            $data['photographer'] = $this->photographerModel->read(['*'], ['user_id' => Auth::isLogin()]);
            $data['categories'] = $this->categoryModel->getAll();
            View::load('profiles.photographer', $data, 'base-layout');
        }
    }




    public function avatar(Request $request)
    {

        $avatar = new Files('avatar');
        $validator = new FileValidator();
        $avatar_uploader = new FileUploader($validator, $avatar);
        $avatar_url = $avatar_uploader->upload();

        if ($avatar_url) {
            $data = array(
                'picture' =>   $avatar_url,
            );
            $this->userModel->update($data, ['id' => Auth::isLogin()]);
            FlashMessage::add("تصویر آواتار آپلود شد!", FlashMessage::SUCCESS);
        } else {
            FlashMessage::add("خطا در آپلود تصویر آواتار", FlashMessage::ERROR);
            $avatar_uploader->destroy();
        }
        Request::redirect($request->referer);
    }


    public function userEdit(Request $request)
    {

        if (!$request->isAjax()) {
            echo "Invalid Request!";
            die();
        }

        if (!is_bool(Validation::validator(['name' => $request->name], ['name' => 'regex,/[ا-ی]/']))) {
            die('لطفا نام را به صورت فارسی تایپ کنید!');
        }

        if (!is_bool(Validation::validator(['mobile' => $request->mobile], ['mobile' => 'numeric|max_len,11|min_len,11']))) {
            die('موبایل باید حتما ۱۱ رقم و به شکل لاتین وارد شود!');
        }

        if (!is_bool(Validation::validator(['gender' => $request->gender], ['gender' => 'numeric|exact_len,1']))) {
            die();
        }
        $data = array(
            'name' => $request->name,
            'mobile' => $request->mobile,
            'gender' => $request->gender
        );
        $data = removeNullMembers($data);

        if ($this->userModel->update($data, ['id' => Auth::isLogin()])) {
            echo "تغییر مشخصات با موفقیت انجام شد!";
        }
    }


    public function generateHash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }




    public function shutterEdit(Request $request)
    {

        if (!$request->isAjax()) {
            echo "Invalid Request!";
            die();
        }

        $introduce = ['introduce' => $request->introduce];

        if (!is_bool(Validation::validator(['name' => $request->name], ['name' => 'regex,/[ا-ی]/']))) {
            die('لطفا نام را به صورت فارسی تایپ کنید!');
        }

        if (!is_bool(Validation::validator(['mobile' => $request->mobile], ['mobile' => 'numeric|max_len,11|min_len,11']))) {
            die('موبایل باید حتما ۱۱ رقم و به شکل لاتین وارد شود!');
        }

        if (!is_bool(Validation::validator(['gender' => $request->gender], ['gender' => 'numeric|exact_len,1']))) {
            die();
        }

        if (!is_bool(Validation::validator($introduce, ['introduce' => 'regex,/[ا-ی]/']))) {
            die('لطفا متن موردنظر خود را به شکل فارسی تایپ کنید!');
        }
        $data = array(
            'name' => $request->name,
            'mobile' => $request->mobile,
            'gender' => $request->gender
        );
        $data = removeNullMembers($data);
        $updat_characteristic = $this->userModel->update($data, ['id' => Auth::isLogin()]);

        if (strlen($request->introduce) > 0) {
            $update_introduce = $this->photographerModel->update($introduce, ['user_id' => Auth::isLogin()]);
        }

        if ($updat_characteristic || ($update_introduce ?? '')) {
            echo "تغییر مشخصات با موفقیت انجام شد!";
        }
    }






    public function editPassword(Request $request)
    {
        if (!$request->isAjax()) {
            echo "Invalid Request!";
            die();
        }


        $user_id = Auth::isLogin();
        $user_password = $this->userModel->read('password', ['id' => $user_id]);

        $data = array('pass' => $request->pwd, 'new_pass' => $request->pwd_new, 'confirm_pass' => $request->pwd_confirm);
        $pattern = array('pass' => 'required', 'new_pass' => 'required|min_len,6', 'confirm_pass' => 'required|min_len,6');
        if (!is_bool(Validation::validator($data, $pattern))) {
            die('رمز وارد شده باید بیشتر از 6 کاراکتر و شامل حروف و اعداد و کاراکترهای خاص باشد!');
        }

        if (
            ($request->pwd_new == $request->pwd_confirm)
            && (password_verify($request->pwd, $user_password[0]->password))
        ) {

            $new_password = array(
                'password' =>  $this->generateHash($request->pwd_new)
            );

            if ($this->userModel->update($new_password, ['id' => $user_id])) {
                echo "تغییر رمز عبور با موفقیت انجام شد!";
            }
        }
    }



    public function modalimage(Request $request)
    {
        if (is_bool(Validation::validator(['id' => $request->id], ['id' => 'numeric']))) {
            $data = $this->imgModel->read(['title', 'description', 'link'], [
                'id' => $request->id,
                'photographer_id' => Auth::isLogin()
            ]);
            list($result['title'], $result['story'], $result['link']) =
                [$data[0]->title, $data[0]->description, $data[0]->link];
            echo json_encode($result);
        }
    }




    public function forgetPassword(Request $request)
    {

        $user_id = $this->userModel->read(['id'], ['email' => $request->fp]);
        $lreadyExistUser = $user_id[0]->id ?? '';


        if (!$lreadyExistUser) {
            die('کاربری با این ایمیل و یا نام کاربری یافت نشد! ');
        }


        $new_pass = Auth::generateRandomPassword();
        $hash_new_pass = Auth::generateHash($new_pass);

        $mail = new Email();
        if ($this->userModel->update(
            ['password' => $hash_new_pass],
            ['id' => $user_id[0]->id]
        )) {
            $mail = new Email();
            $mail->sendMail($request->fp, $new_pass, 'رمز عبور جدید');
        }
    }




    public function messageToAdmin(Request $request)
    {
        $user_id = Auth::isLogin();
        $data = ['message' => $request->message, 'id' => $user_id];
        $pattern = ['message' => 'required|regex,/[ا-ی]/|max_len,50', 'id' => 'numeric'];
        if (!is_bool(Validation::validator($data, $pattern))) {
            die('لطفا پیام خود را به زبان فارسی وارد کنید!');
        }
        $user_name = $this->userModel->read('name', ['id' => $user_id]);
        $sender = "1000596446";
        $receptor = "09364962308";
        $message = $user_name[0]->name . "\t:\t" . $request->message;
        $api = new \Kavenegar\KavenegarApi(SMS_API_KEY);
        if ($api->Send($sender, $receptor, $message)) {
            echo "پیام شما با موفقیت ارسال شد.";
        }
    }


    public function delete(Request $request)
    {
        if (is_bool(Validation::validator(['id' => $request->id], ['id' => 'numeric']))) {
            $this->imgModel->delete(['id' => $request->id], ['photographer_id' => Auth::isLogin()]);
        }
        Request::redirect('profile/user');
    }
}
