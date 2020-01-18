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

                    <!-- Swiper -->
                    <div id="photographer-slider" class="swiper-container photographer-swiper photographer-swiper2">
                        <div class="swiper-wrapper">
                            <figure class="swiper-slide swiper-item" style="width:330px;background-image: url('<?= $best_shooter[0]->picture ?>');">
                                <h4>
                                    <?= $best_shooter[0]->name ?>
                                </h4>
                                <a href="<?= site_url("profile/public/" . $best_shooter[0]->id) ?>">
                                    مشاهده عکس ها
                                    <span class="camera-icn icn"></span>
                                </a>
                            </figure>
                            <figure class="swiper-slide swiper-item" style="background-image: url('<?= $best_shooter[1]->picture ?>');width:330px;">
                                <h4>
                                    <?= $best_shooter[1]->name ?>
                                </h4>
                                <a href="<?= site_url("profile/public/" . $best_shooter[1]->id) ?>">
                                    مشاهده عکس ها
                                    <span class="camera-icn icn"></span>
                                </a>
                            </figure>
                            <figure class="swiper-slide swiper-item" style="background-image: url('<?= $best_shooter[2]->picture ?>');width:330px;">
                                <h4>
                                    <?= $best_shooter[2]->name ?>
                                </h4>
                                <a href="<?= site_url("profile/public/" . $best_shooter[2]->id) ?>">
                                    مشاهده عکس ها
                                    <span class="camera-icn icn"></span>
                                </a>
                            </figure>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>

                </section>
            </section>

        </main>
    </section>
</section>