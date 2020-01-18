<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="SalePic، وبسایتی برای عکاسان حرفه ای، خوش ذوق و ماهر.">
    <meta name="keywords" content="عکاسی، عکس، تصویر، هنر.">
    <meta name="author" content="Aarony Babakhanians">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SalePic</title>
    <link rel="icon" href="<?= asset('assets/images/fav-icon.png') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/bootstrap-rtl/bootstrap-rtl.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/swiper-master/css/swiper.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/featherlight/featherlight.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/featherlight/featherlight.gallery.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/font-awesome-5.0.6/css/fontawesome-all.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('vendor/select2/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/stylesheet.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/stylesheet2.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/responsive.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/responsive2.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/icons.css') ?>">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
    <script src="<?= asset('vendor/jQuery/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= asset('vendor/featherlight/jquery.detect_swipe.js') ?>"></script>

</head>

<body>
    <?php get_tpl_path('base_header'); ?>
    <?= $view ?>
    <?php \App\Utilities\FlashMessage::show_messages(); ?>
    <?php get_tpl_path('base_footer'); ?>


    <script src="<?= asset('vendor/waypoints/jquery.waypoints.min.js') ?>"></script>
    <script src="<?= asset('vendor/waypoints/inview.min.js') ?>"></script>
    <script src="<?= asset('vendor/select2/select2.full.min.js') ?>"></script>
    <script src="<?= asset('vendor/lightslider/js/lightslider.min.js') ?>"></script>
    <script src="<?= asset('vendor/swiper-master/js/swiper.min.js') ?>"></script>
    <script src="<?= asset('vendor/featherlight/featherlight.js') ?>"></script>
    <script src="<?= asset('vendor/featherlight/featherlight.gallery.js') ?>"></script>
    <script src="<?= asset('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('assets/js/scripts.js') ?>"></script>
    <script src="<?= asset('assets/js/click-scripts.js') ?>"></script>
    <script src="<?= asset('assets/js/common.js') ?>"></script>


</body>

</html>