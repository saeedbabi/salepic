<?php

namespace App\Services\Auth\Contract;

use App\Models\User;
use App\Services\Auth\Auth;

abstract class AuthProvider
{

    public static $instance = null;
    public  $userModel;

    public static function instance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static(new User());
        }
        return static::$instance;
    }

    protected function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function isAdminUser($uid = null)
    {

        $user_id = $uid ?? Auth::isLogin();
        if (!$user_id) {
            return false;
        }
        $user_role = $this->userModel->read('role', ['id' => $user_id]);
        //echo $user_role;
        return ($user_role[0]->role == 'admin');
    }

    public abstract function register(array $data);
    public abstract function login($email, $pasword);
    public abstract function isLogin(): int;
    public abstract function logout();

    public function generateHash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }


    public function generateRandomPassword()
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $pass = array();
        $pass_length = rand(8, 16);
        for ($i = 0; $i < $pass_length; $i++) {
            $index = rand(0, strlen($chars) - 1);
            $pass[] = $chars[$index];
        }
        return implode($pass);
    }

    // Is bettter and better these methods to be in validation services

    public function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }


    public function isStrongPassword($password)
    {
        $strong_pattern = '[0-9!@#$%^&*()]';
        if (strlen($password) < 6 && preg_match_all($strong_pattern, $password) >= 2) {
            return false;
        }
        return $password;
    }
}
