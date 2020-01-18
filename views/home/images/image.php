<?php
//var_dump($image);
?>
<div id="cmnt-new-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">SalePic</h4>
            </div>
            <div class="modal-body">

                <p class="modal-txt">نظر خود را ثبت کنید:</p>

                <form class="custom-form">
                    <div class="form-group">
                        <input type="text" class="form-control custom-form-control" id="fullname" name="fullname" placeholder="نام و نام خانوادگی">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control custom-form-control" id="user-email" name="user-email" placeholder="ایمیل">
                    </div>
                    <div class="form-group">
                        <textarea rows="3" name="user-msg" id="user-msg" class="form-control custom-form-control" placeholder="نظر شما"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default btn-custom-link3 custom-form-control">
                        <span>ثبت</span>
                    </button>
                </form>
            </div>
            <!--<div class="modal-footer">-->
            <!--<button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>-->
            <!--</div>-->
        </div>

    </div>
</div>

<main id="product-page">
    <section class="pro-top container-fluid">
        <section class="row">
            <aside class="col-md-4 pro-desc-parent">
                <article class="pro-desc-wrapper" id="side-product">
                    <a class="down-btn btn btn-success btn-success-custom btn-group-justified" data-toggle="collapse" data-target=".dropdown-custom">
                        <span class="download-icn icn"></span>
                        دانلود رایگان
                        <span class="caret-down2-icn icn"></span>
                    </a>

                    <div class="dropdown-custom collapse">
                        <h5> ابعاد تصویر </h5>
                        <div class="size-row">
                            <div class="size-wrapper">
                                <span> اصلی </span><span class="the-size"> (۳۶۴۸*۲۷۳۶) </span>
                            </div>
                            <input class="" type="radio" name="size" />
                        </div>
                        <div class="size-row">
                            <div class="size-wrapper">
                                <span> بزرگ </span><span class="the-size"> (۱۹۲۰*۱۴۴۰) </span>
                            </div>
                            <input class="" type="radio" name="size" />
                        </div>
                        <div class="size-row">
                            <div class="size-wrapper">
                                <span> متوسط </span><span class="the-size"> (۱۲۸۰*۹۶۰) </span>
                            </div>
                            <input class="" type="radio" name="size" />
                        </div>
                        <div class="size-row last-row">
                            <div class="size-wrapper">
                                <span> کوچک </span><span class="the-size"> (۶۴۰*۴۸۰) </span>
                            </div>
                            <input class="" type="radio" name="size" />
                        </div>

                        <a href="<?=asset('assets/images/gallery/rocks.jpeg')?>" type="button" class="btn btn-success-custom download-btn">
                            دانلود
                            <span class="download-icn icn"></span>
                        </a>
                    </div>

                    <div class="like-view row">
                        <div class="lv-pack col-xs-6 text-center">
                            <i class="like-btn <?=($alreadyLikes) ? 'fas' : 'far'?> fa-heart"
                            data-type="image" data-id="<?=$image[0]->id?>"></i>
                           <span class="like-count"> <?=$image[0]->likes?> </span>
                        </div>

                        <div class="lv-pack col-xs-6 text-center">
                            <i class="fa fa-eye"></i>
                            <span class="view-count"> <?=$image[0]->view_count?> </span>
                        </div>
                    </div>


                    <div class="pro-caption">
                        <h1>
                            <a href="<?=site_url('profile/public/' . $image[0]->photographer_id)?>" class="shooter-pack">
                                <span class="camera-icn icn"></span>
                                <img src="<?=$shooter[0]->picture?>" class="shooter-img img-circle" />
                                <span class="shooter-name"><?=$shooter[0]->name?></span>
                            </a>
                        </h1>

                        <h4 class="pro-story">داستان تصویر </h4>
                        <p>
                            <?=$image[0]->description?>
                        </p>

                        <div class="pro-features">
                            <ul>
                                <li>
                                    <i class="fa fa-check"></i>
                                    رایگان برای استفاده شخصی و تبلیغاتی
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>
                                    دانلود رایگان
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>
                                    امکان دریافت در ابعاد مختلف
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>
                <!--pro-desc-wrapper-->
            </aside>

            <article class="col-md-8 pro-img-parent">
                <figure href="<?=$image[0]->link?>" id="pro-img">
                    <img src="<?=$image[0]->link?>" class="img-responsive" />
                </figure>
            </article>
        </section>
    </section>

</main>