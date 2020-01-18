<?php
function config($name)
{
    return include BASE_PATH . "configs/{$name}.php";
}
function dd(...$args)
{
    echo "<pre style='background:#f7f7f7'>";
    var_dump($args);
    echo "</pre>";
    die();
}

function site_url($uri)
{
    return BASE_URL . $uri;
}

function storage_url($file_name)
{
    return  site_url("storage/$file_name");
}
function storage_path($file_name)
{
    return STORAGE_PATH . $file_name;
}

function admin_url($uri)
{
    return site_url('admin' . $uri);
}

function theme_url($uri)
{
    $active_theme = getOption('active_theme');
    return site_url("views/$active_theme/$uri");
}

function theme_path($uri)
{
    $active_theme = getOption('active_theme');
    return BASE_VIEW_PATH . $active_theme . "/" . $uri;
}

function removeEmptyMembers($array)
{
    return  array_filter($array, function ($a) {
        return trim($a) !== "";
    });
}


function removeNullMembers($array)
{
    return  array_filter($array, function ($a) {
        return $a != null;
    });
}


function asset($file_path)
{
    return site_url("views/" . DEFAULT_THEME . "/" . $file_path);
}


function asset_admin($file_path)
{
    return site_url("views/admin/assets/" . $file_path);
}

function array_of_objects($arr2d)
{
    $array_of_objects = array();
    foreach ($arr2d as $arr) {
        $array_of_objects[] = (object) $arr;
    }
    return $array_of_objects;
}

function getOption($key)
{
    return \App\Utilities\Option::get($key) ?? '';
}

function get_tpl_path($tpl_name)
{
    $tpl = include BASE_PATH . "views/tpls/" . $tpl_name . ".php";
    return $tpl;
}

function get_theme_stylesheet()
{
    return theme_url("style.css");
}
