<?php
//dd($categories);
?>

<main id="search-page-wrapper">
    <section class="container-fluid" id="search-page">
        <section class="row">
            <aside class="col-xs-12 col-md-3">
                <div id="side-sort" class="sort-wrapper part-wrapper ">
                    <h3>مرتب سازی بر اساس</h3>
                    <ul>
                        <li>
                            <span class="sort-option" sort-id="view_count">پربازدیدترین ها</span>
                            <span class="eye-icn icn"></span>
                        </li>
                        <li>
                            <span class="sort-option" sort-id="comment_count">پربحث ترین ها</span>
                            <span class="comment-icn icn"></span>
                        </li>
                        <li>
                            <span class="sort-option" sort-id="likes">محبوب ترین ها</span>
                            <span class="like-icn icn"></span>
                        </li>
                        <li>
                            <span class="sort-option" sort-id="uploaded_at">جدیدترین ها</span>
                            <span class="new-icn icn"></span>
                        </li>
                        <li>
                            <span class="sort-option" sort-id="sale_count">بیشترین دانلود</span>
                            <span class="download-icn icn"></span>
                        </li>
                    </ul>
                </div>
                <div id="side-sort" class="sort-wrapper part-wrapper ">
                    <h3>دسته بندی ها</h3>
                    <ul>
                        <?php foreach ($categories as $key => $category) : ?>
                            <li>
                                <span class="sort-option" sort-id="<?= $category->id ?>"><?= $category->name ?></span>
                                <span class="<?= $category->slug ?>-icn icn"></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </aside>
            <article class="col-xs-12 col-md-9">
                <div class="part-wrapper container-fluid">
                    <section class="main-top-part row">
                        <h1> <?= '' ?> </h1>
                        <p class="item-count">
                            نمایش <?= $images->start ?? 0 ?> تا <?= ($images->start - 1) + count($images->records) ?> از <?= $images->total_records ?> تصویر
                        </p>
                    </section>
                    <section class="main-main-part row">
                        <?php foreach ($images->records as $key => $image) : ?>
                            <article class="col-sm-6 col-md-4">
                                <div class="item-box">
                                    <img class="img-responsive main-img" src="<?= $image->link ?>" />
                                    <div class="item-info">
                                        <h4 class="item-title">
                                            <a href class="shooter-pack">
                                                <span class="camera-icn icn"></span>
                                                <img src="<?= $image->picture ?>" class="shooter-img img-circle" />
                                                <span class="shooter-name"><?= $image->name ?></span>
                                            </a>
                                        </h4>
                                        <div class="item-option">
                                            <span class="eye-icn icn"></span>
                                            <span><?= $image->view_count ?></span>
                                        </div>
                                    </div>
                                    <a href="<?= site_url("image/$image->id") ?>" class="item-box-hover">
                                        <span title="جزئیات تصویر" class="popular-eye-icn icn"></span>
                                    </a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </section>
                    <section class="row main-bottom">
                        <ul class="pagination justify-content-center ml-1">
                            <?php for ($p = 1; $p <= $images->page_count; $p++) :
                                $cat = $_GET['c'] ?? '';
                                $key = $_GET['k'] ?? ''; ?>
                                <li><a href="<?= site_url("search?k={$key}&c={$cat}&page={$p}") ?>"><?= $p ?></a></li>
                            <?php endfor; ?>
                        </ul>
                    </section>

                </div>
            </article>


        </section>
    </section>
</main>