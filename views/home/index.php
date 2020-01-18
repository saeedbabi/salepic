<?php
//var_dump($categories);
?>
<section id="top-bg" style="background-image: url('<?= asset("assets/images/bg-camera-leaves.jpg") ?>')">
    <section id="top-bg-overlay">
        <article id="search-main-wrapper">
            <form method="get" action="<?= site_url('search') ?>" class="main-search">
                <input type="text" id="search-main" name="k" autocomplete="off" placeholder="تصویر مورد نظر خود را جستجو کنید..." />
                <div class="search-icon-wrapper">
                    <i class="search-icn icn"></i>
                    <input type="submit" />
                </div>
            </form>
        </article>
        <div id='result'></div>
        <main id="down-page-bg">

            <section class="bg-wrapper">

                <section id="photographer" class="home-bot">
                    <div class="head-row">
                        <!--<div class="side-line side-line-top"></div>-->
                        <!--<div class="side-line side-line-bot"></div>-->
                        <h1>
                            <i class="popular-eye-icn icn icn-right1"></i>
                            <i class="popular-eye-icn icn icn-right2"></i>
                            <i class="popular-eye-icn icn icn-right3"></i>
                            عکاسان برگزیده
                            <i class="popular-eye-icn icn icn-left1"></i>
                            <i class="popular-eye-icn icn icn-left2"></i>
                            <i class="popular-eye-icn icn icn-left3"></i>
                        </h1>
                    </div>

                    <div class="row" style="margin-right:-10px;margin-left:-12px;width:100%">
                        <?php foreach ($best_shutter as $key => $shutter) : ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="<?= $shutter->picture ?>" alt="<?= $shutter->name ?>">
                                    <div class="caption">
                                        <h3><?= $shutter->name ?></h3>
                                        <p> <span class="camera-icn icn"></span>&nbsp;<a href="<?= site_url("profile/public/" . $shutter->id) ?>">مشاهده عکس ها</a></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <!-- Swiper -->

                </section>
            </section>

        </main>
    </section>
</section>