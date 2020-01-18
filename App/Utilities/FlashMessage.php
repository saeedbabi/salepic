<?php

namespace App\Utilities;

use App\Services\View\View;

class FlashMessage
{
    const SUCCESS = 1;
    const ERROR = 2;
    const WARNING = 3;
    const INFO = 4;
    public static $has_error = false;



    public static function add($msg, $type = FlashMessage::SUCCESS)
    {
        if (!isset($_SESSION['flash_messages'])) {
            $_SESSION['flash_messages'] = array();
        }
        $_SESSION['flash_messages'][] = (object) ['msg' => $msg, 'type' => $type];
        if ($type == FlashMessage::ERROR) {
            self::$has_error = true;
        }
    }



    public static function clean()
    {
        $_SESSION['flash_messages'] = array();
        self::$has_error = false;
    }



    public static function get_messages()
    {
        return $_SESSION['flash_messages'] ?? array();
    }



    public static function show_messages()
    {
        $flash_messages = self::get_messages();
        if (empty($flash_messages)) {
            return;
        }
        $data = [
            'flash_messages' => $flash_messages
        ];
        View::load_from_base('flash.notice', $data);
        self::clean();
    }




    public static function getCssClass($type)
    {
        switch ($type) {
            case self::ERROR:
                return "flash-error";
            case self::SUCCESS:
                return "flash-success";
            case self::WARNING:
                return "flash-warning";
            case self::INFO:
                return "flash-info";
            default:
                return "flash-info";
        }
    }
}
