<?php
//var_dump($_REQUEST);
?>

<main id="public-profile" class="container-fluid">
    <section id="public-top-section" class="row">
        <article class="text-center col-sm-6 user-img-name">
            <img src="<?=$info[0]->picture?>" class="img-responsive img-circle user-img" />
            <h1><?=$info[0]->name?></h1>
        </article>
        <article class="text-center col-sm-6">
            <div class="row country-row">
                <span class="country-label"> معرفی: </span>
                <span class="user-country"> <?=$introduce[0]->introduce?> </span>
            </div>
            <div class="row">
                <span class="rate-label"> محبوبیت: </span>
                <span class="user-rate">
                    <i class="fa fa-star not-filled"></i>
                    <i class="fa fa-star not-filled"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </span>
            </div>

        </article>
    </section>

    <section id="public-middle-section" class="row" style="border:none;border-bottom:1px solid #fff;">
        <article class="col-sm-6 text-center">
            <input type="text" name="keyword" class="user-search" autocomplete="off" placeholder="جستجو...">
            <ul class="result"></ul>
        </article>
    </section>

    <section id="public-bottom-section" class="row">

        <article class="flexbox">
            <?php foreach ($images->records as $key => $image): ?>
                <div class="item">
                    <img src="<?=$image->link?>" />
                    <div class="icons-pack">
                        <i href="<?=$image->link?>" data-featherlight="image" class="fa fa-search-plus"></i>
                        <a href="" class="view-btn fa fa-eye"
                         data-id="<?=$image->id?>" data-entity="image"></a>
                    </div>
                </div>
            <?php endforeach;?>
        </article>

        <article class="bottom-cloth">

            <div class="pagination-wrapper">
                <ul class="pagination">
                    <?php for ($p = 1; $p <= $images->page_count; $p++): ?>
                        <li><a href="<?=site_url("profile/public/{$info[0]->id}/{$p}")?>"><?=$p?></a></li>
                    <?php endfor;?>
                </ul>
                <p class="item-count">
                    نمایش <?=$images->start?> تا <?=($images->start - 1) + count($images->records)?> از <?=$images->total_records?> تصویر
                </p>
            </div>
        </article>



    </section>
</main>