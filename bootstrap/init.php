<?php

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
include "constants.php";
include "helpers/global.php";
include BASE_PATH . "vendor/autoload.php";
if (IS_DEV_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection(config('database'));
$capsule->setAsGlobal();
$capsule->bootEloquent();
