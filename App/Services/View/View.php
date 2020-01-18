<?php

namespace App\Services\View;

use App\Utilities\Option;

class View
{
    public static function load_from_base($view, $data = array(), $layout = null)
    {
        // load from base
        $view = str_replace(".", "/", $view);
        $full_view_path = BASE_VIEW_PATH . "$view.php";
        // echo $full_view_path;
        if (file_exists($full_view_path) && is_readable($full_view_path)) {
            ob_start();
            extract($data);
            include_once $full_view_path;
            $view = ob_get_clean();
            if (is_null($layout)) {
                echo $view;
            } else {
                $layout_full_view_path = BASE_VIEW_PATH . "layouts/" . "$layout.php";
                //echo $layout_full_view_path;
                include_once $layout_full_view_path;
            }
        } else {

            echo  "Error : view not exists!";
        }
    }

    public static function load($view, $data = array(), $layout = null)
    {
        //load from themes
        self::load_from_base(DEFAULT_THEME . "." . $view, $data, $layout);
    }

    public static function render_from_base($view, $data = array(), $layout = null)
    {
        ob_start();
        self::load_from_base($view, $data, $layout);
        return ob_get_clean();
    }


    public static function render($view, $data = array(), $layout = null)
    {
        ob_start();
        self::load($view, $data, $layout);
        return ob_get_clean();
    }
}
