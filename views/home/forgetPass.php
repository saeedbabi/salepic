<?php
//var_dump($categories);
?>
<section id="top-bg">
    <section id="top-bg-overlay">
        <div class="row" style="margin: 30px;text-align:center">
            <h2>فراموشی رمز عبور</h2>
        </div>
        <form class="ajfp" method="POST" action="<?= site_url('resetPass') ?>">
            <article id="search-main-wrapper">
                <input type="email" id="search-email" name="fp" autocomplete="off" placeholder="آدرس ایمیل خود را وارد کنید" />
                <div class="search-icon-wrapper">
                    <i class="telegram-icn icn"></i>
                    <input type="submit" />
                </div>
            </article>
            <div id='result'></div>
        </form>
    </section>
</section>