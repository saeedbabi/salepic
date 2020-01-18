<?php

namespace App\Services\Auth\Providers;

use App\Services\Auth\Contract\AuthProvider;
use App\Services\Validation\Validation;

class SessionProvider extends AuthProvider
{
    const AUTH_KEY = 'auth';

    public function register(array $data)
    {
        if (!is_bool(Validation::validator(['name' => $data['name']], ['name' => 'required|regex,/[ا-ی]/']))) {
            die('لطفا نام را به صورت فارسی تایپ کنید!');
        }

        if (!is_bool(Validation::validator(['email' => $data['email']], ['email' => 'required|valid_email']))) {
            die('فرمت وارد شده برای ایمیل صحیح نیست!');
        }

        if (!is_bool(Validation::validator(['password' => $data['password']], ['password' => 'required|max_len,20|min_len,6']))) {
            die('رمز عبور باید حداقل ۶ کاراکتر باشد!');
        }

        if (!is_bool(Validation::validator(['mobile' => $data['mobile']], ['mobile' => 'numeric|max_len,11|min_len,11']))) {
            die('موبایل باید حتما ۱۱ رقم و به شکل لاتین وارد شود!');
        }


        if ($this->userModel->alreadyExists($data['email'])) {
            die('کاربری با این ایمیل قبلا در سایت ثبت نام نموده است!');
        }


        $data['email'] = strtolower($data['email']);
        $data['password'] = $this->generateHash($data['password']);
        $user_id = $this->userModel->create($data);


        if ($user_id) {
            echo 'ثبت نام شما با موفقیت انجام شد!';
            return $user_id;
        } else {
            echo 'مشکلی در هنگام ثبت نام شما رخ داده است!';
            return false;
        }
    }





    public function login($email, $password)
    {
        $user = $this->userModel->read(['*'], ['email' => $email]);
        // wrong email
        if (is_null($user)) {
            echo 'ایمیل یا رمز عبور وارد شده اشتباه است!';
            return false;
        }

        // wrong password
        if (!password_verify($password, $user[0]->password ?? '')) {
            echo 'ایمیل یا رمز عبور وارد شده اشتباه است!';
            return false;
        }
        $_SESSION[self::AUTH_KEY] = $user[0]->id;
        echo 'شما با موفقیت لاگین شدید!';
        return true;
    }



    public function isLogin(): int
    {
        $user_id = $_SESSION[self::AUTH_KEY] ?? 0;
        return $user_id;
    }



    public function logout()
    {
        if (isset($_SESSION[self::AUTH_KEY])) {
            unset($_SESSION[self::AUTH_KEY]);
        }
        return true;
    }
}
