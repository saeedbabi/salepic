<?php
//var_dump($_SESSION);
?>
<!-- Modal -->
<div id="img-pack" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" id="modal-title"> </h3>
            </div>
            <div class="modal-body">

                <img src="" alt="" class="img-responsive img-rounded" id="img-modal">

                <h4> داستان تصویر: </h4>
                <p class="img-story">

                </p>

            </div>
        </div>

    </div>
</div>

<!--<div id="comment-pack" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
<!--<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"> پکیج نظرات </h3>
    </div>
    <div class="modal-body">
        <div id="cmnt" class="collapse">
            <ul id="cmnt-list">
                <li class="cmnt-row">
                    <img src="<?= asset('assets/images/photographer/shooter-girl.jpg') ?>" class="img-responsive img-circle" />
                    <span class="cmnt-date">۱۳۹۷/۰۶/۱۷</span>
                    <h4 class="cmnt-title">مریم مهربانی</h4>
                    <p class="cmnt-txt">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                        است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                        فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.

                    </p>
                    <div class="cmnt-answer-wrapper">
                        <button data-toggle="collapse" data-target="#cmnt-answer1" type="button" class="cmnt-answer"> پاسخ به نظر
                        </button>

                        <div id="cmnt-answer1" class="collapse cmnt-answer-container">
                            <form class="custom-form">
                                <div class="form-group">
                                    <textarea rows="4" name="msg" id="msg" class="form-control custom-form-control" placeholder="پاسخ شما"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default btn-custom-link3 custom-form-control">
                                    <span> ثبت پاسخ </span>
                                </button>
                            </form>
                        </div>

                    </div>

                </li>
                <li class="cmnt-row">
                    <img src="<?= asset('assets/images/photographer/shooter-guy.jpg') ?>" class="img-responsive img-circle" />
                    <span class="cmnt-date">۱۳۹۷/۰۶/۱۷</span>
                    <h4 class="cmnt-title">پیام نصیری</h4>
                    <p class="cmnt-txt">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                        است.
                    </p>
                    <div class="cmnt-answer-wrapper">
                        <button data-toggle="collapse" data-target="#cmnt-answer2" type="button" class="cmnt-answer"> پاسخ به نظر
                        </button>

                        <div id="cmnt-answer2" class="collapse cmnt-answer-container">
                            <form class="custom-form">
                                <div class="form-group">
                                    <textarea rows="4" name="msg" id="msg" class="form-control custom-form-control" placeholder="پاسخ شما"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default btn-custom-link3 custom-form-control">
                                    <span> ثبت پاسخ </span>
                                </button>
                            </form>
                        </div>

                    </div>
                </li>
                <li class="cmnt-row">
                    <img src="<?= asset('assets/images/photographer/shooter-girl2.jpg') ?>" class="img-responsive img-circle" />
                    <span class="cmnt-date">۱۳۹۷/۰۶/۱۷</span>
                    <h4 class="cmnt-title">جین آستین</h4>
                    <p class="cmnt-txt">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                        است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                        فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.

                    </p>
                    <div class="cmnt-answer-wrapper">
                        <button data-toggle="collapse" data-target="#cmnt-answer3" type="button" class="cmnt-answer"> پاسخ به نظر
                        </button>

                        <div id="cmnt-answer3" class="collapse cmnt-answer-container">
                            <form class="custom-form">
                                <div class="form-group">
                                    <textarea rows="4" name="msg" id="msg" class="form-control custom-form-control" placeholder="پاسخ شما"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default btn-custom-link3 custom-form-control">
                                    <span> ثبت پاسخ </span>
                                </button>
                            </form>
                        </div>

                    </div>
                </li>
            </ul>


        </div>
    </div>
</div>

 </div>
</div>-->

<div id="user-info-edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"> ویرایش مشخصات </h3>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('profile/user/shutter/edit') ?>" method="post" class="custom-form ajax-form">
                    <div class="form-group">
                        <input type="text" class="form-control custom-form-control" id="name" name="name" placeholder="نام">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control custom-form-control" id="mobile" name="mobile" placeholder="تلفن همراه">
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control custom-form-control" id="introduce" name="introduce" placeholder="شرح حالی در مورد خویشتن بنگارید:"></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control custom-form-control" id="country" name="gender">
                            <option value="0">مرد</option>
                            <option value="1">زن</option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-default btn-custom-link3 custom-form-control">
                        <span>ثبت تغییرات</span>
                    </button>
                    <div class="result" style="color: coral"></div>
                </form>
            </div>
        </div>

    </div>
</div>


<main id="user-profile-page" class="container-fluid">
    <section id="user-top-section" class="row">
        <article class="text-center col-sm-4">
            <h1><?= $userinfo[0]->name ?? '' ?> </h1>
        </article>
        <article class="col-sm-4">
            <img src="<?= $userinfo[0]->picture ?? '' ?>" class="img-responsive img-circle user-img" />
        </article>
        <article class="text-center col-sm-4">
            <div class="user-rate">
                <?php if ($photographer[0]->rank ?? '') : ?>
                    <?php for ($i = 0; $i < $photographer[0]->rank - 1; $i++) : ?>
                        <?= '<i class="fa fa-star not-filled"></i>'; ?>
                    <?php endfor; ?>
                    <?php for ($i = 0; $i <= 5 - $photographer[0]->rank; $i++) : ?>
                        <?= '<i class="fa fa-star"></i>'; ?>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </article>

    </section>

    <section id="user-nav-section" class="row">

        <ul class="nav nav-pills nav-justified" role="tablist">

            <li class="nav-item active">
                <a class="nav-link" data-target="#box1" data-toggle="tab"> تصاویر من

                    <span class="fas fa-images"></span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-target="#box2" data-toggle="tab">
                    آپلود تصویر
                    <span class="camera-icn icn"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#box3" data-toggle="tab">
                    مشخصات من
                    <span class="camera-icn icn"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#box4" data-toggle="tab"> تغییر رمز عبور

                    <span class="fa fa-lock"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#box5" data-toggle="tab"> ارتباط با مدیریت
                    <span class="fa fa-paper-plane-o" aria-hidden="true"></span>
                </a>
            </li>
        </ul>

    </section>

    <section id="user-main-section" class="row">

        <div class="tab-content float-right box-content">
            <div class="tab-pane images-wrapper active" role="tabpanel" id="box1">

                <section class="box1 box-wrapper">
                    <article class="box-item flex-box">
                        <?php foreach ($images->records as $key => $image) : ?>
                            <div class="flex-item">
                                <div class="flex-item-inner">
                                    <div class="item-row">
                                        <span class="download-icn icn item-icon"></span>
                                        <div class="element-title-wrapper">
                                            <h4 class="element-title"> دانلودها: </h4>
                                        </div>

                                        <div class="element-counter-wrapper">
                                            <span class="element-counter"><?= $image->sale_count ?></span>
                                        </div>
                                    </div>
                                    <div class="item-row">
                                        <span class="like-icn icn item-icon"></span>
                                        <div class="element-title-wrapper">
                                            <h4 class="element-title"> لایک ها: </h4>
                                        </div>
                                        <div class="element-counter-wrapper">
                                            <span class="element-counter"><?= $image->likes ?></span>
                                        </div>
                                    </div>
                                    <div class="item-row">
                                        <span data-target="#comment-pack" data-toggle="modal" class="comment-icn icn item-icon"></span>
                                        <div class="element-title-wrapper">
                                            <h4 class="element-title"> نظرات: </h4>
                                        </div>
                                        <div class="element-counter-wrapper">
                                            <span class="element-counter">۱۰</span>
                                        </div>
                                    </div>
                                    <div class="item-row">
                                        <span class="eye-icn icn item-icon"></span>
                                        <div class="element-title-wrapper">
                                            <h4 class="element-title"> بازدیدها: </h4>
                                        </div>
                                        <div class="element-counter-wrapper">
                                            <span class="element-counter"><?= $image->view_count ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-item-inner-img">
                                    <div class="item-img-wrapper">
                                        <img src="<?= $image->link ?>" class="item-img" />
                                        <a href="#" data-target="#img-pack" data-toggle="modal" modal-id="<?= $image->id ?>" class="image-modal">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                        <a href="<?= site_url('profile/user/delete?id=' . $image->id) ?>" class=" delete-img">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>


                    </article>
                    <div class="pagination-wrapper">
                        <ul class="pagination">
                            <?php for ($p = 1; $p <= $images->page_count; $p++) : ?>
                                <li><a href="<?= site_url("profile/user?page={$p}") ?>"><?= $p ?></a></li>
                            <?php endfor; ?>
                        </ul>
                        <p class="item-count">
                            نمایش <?= $images->start ?> تا <?= ($images->start - 1) + count($images->records) ?> از <?= $images->total_records ?> تصویر
                        </p>
                    </div>

                </section>
                <!--.box-wrapper-->
            </div>
            <!-- #box1 -->

            <div class="tab-pane upload-img" role="tabpanel" id="box2">
                <form class="custom-form" action="<?= site_url('profile/user/upload-image') ?>" method="post" enctype="multipart/form-data">
                    <section class="box2 box-wrapper">
                        <article class="box-item flex-box">

                            <div class="flex-item">
                                <div class="upload-row">
                                    <div class="info-label"> آپلود تصویر:</div>
                                    <div class="info-value form-group">
                                        <div class="upload-file-wrapper">
                                            <input type="file" name="upload-file" id="upload-file" class="form-control custom-form-control" onchange="uploadImg(this.files)" />
                                            <img id="upload-placement" src="<?= asset('assets/images/upload-avatar.png') ?>" class="img-responsive" />
                                            <p id="upload-placement-note">
                                                تصویر خود را آپلود کنید
                                            </p>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-item">
                                <div class="upload-row">
                                    <div class="info-label"> نام عکس:</div>
                                    <div class="info-value form-group">
                                        <input type="text" class="form-control custom-form-control" id="img-story" name="title"></textarea>
                                    </div>
                                </div>
                                <div class="upload-row">
                                    <div class="info-label"> دسته بندی:</div>
                                    <div class="info-value form-group">

                                        <select name="category" class="form-control" id="category">
                                            <?php
                                            foreach ($categories as $key => $category) : ?>
                                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="upload-row">
                                    <div class="info-label"> قیمت(تومان):</div>
                                    <div class="info-value form-group">
                                        <input type="text" class="form-control custom-form-control" id="img-story" name="price" placeholder="قیمت را با اعداد لاتین وارد کنید"></textarea>
                                    </div>
                                </div>
                                <div class="upload-row">
                                    <div class="info-label"> داستان تصویر:</div>
                                    <div class="info-value form-group">
                                        <textarea rows="10" class="form-control custom-form-control" id="img-story" placeholder="داستان تصویر خود را نقل کنید" name="description"></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-default btn-custom-link3">
                                    ثبت تصویر
                                    <span class="upload-photo-icn icn"></span>
                                </button>

                            </div>


                        </article>

                    </section>
                    <!--.box-wrapper-->
                </form>
            </div>

            <!-- #box2 -->
            <div class="tab-pane upload-img" role="tabpanel" id="box3">

                <section class="box3 box-wrapper">
                    <article class="box-item flex-box">

                        <div class="flex-item">
                            <form class="custom-form" action="<?= site_url('profile/user/avatar') ?>" method="POST" enctype="multipart/form-data">
                                <div class="upload-row">
                                    <div class="info-label"> آپلود آواتار:</div>
                                    <div class="info-value form-group">
                                        <div class="upload-file-wrapper">
                                            <input type="file" name="avatar" id="upload-file" class="form-control custom-form-control" onchange="uploadImg(this.files)" />
                                            <img id="upload-placement" src="<?= asset('assets/images/upload-avatar.png') ?>" class="img-responsive" />
                                            <p id="upload-placement-note">
                                                تصویر خود را آپلود کنید
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default btn-custom-link3">
                                    ثبت آواتار
                                    <span class="upload-photo-icn icn"></span>
                                </button>
                            </form>
                        </div>
                        <div class="flex-item">

                            <div class="user-info-row">
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-label"> نام:</div>
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-value"> <?= $userinfo[0]->name ?></div>
                            </div>
                            <div class="user-info-row">
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-label"> ایمیل:</div>
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-value"> <?= $userinfo[0]->email ?></div>
                            </div>
                            <div class="user-info-row">
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-label"> تلفن همراه:</div>
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-value"><?= $userinfo[0]->mobile ?></div>
                            </div>
                            <div class="user-info-row">
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-label"> جنسیت:</div>
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-value"> <?= \App\Enums\FileEnum::gender_type[$userinfo[0]->gender] ?? '' ?></div>
                            </div>

                            <div class="user-info-row">
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-label"> درباره من:</div>
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-value"> <?= $photographer[0]->introduce ?? '' ?></div>
                            </div>
                            <button data-target="#user-info-edit" data-toggle="modal" type="button" class="btn btn-default btn-custom-link3">
                                ویرایش مشخصات
                                <span class="edit-document-icn icn"></span>
                            </button>
                        </div>

                    </article>
                </section>
                <!--.box-wrapper-->

            </div>

            <!-- #box3 -->
            <div class="tab-pane pwd-change" role="tabpanel" id="box4">
                <section class="box4 box-wrapper">
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-12 col-sm-6">
                            <h3>
                                تغییر رمزعبور:
                            </h3>
                            <form class="custom-form ajax-form" action="<?= site_url('profile/user/shutter/edit-pass') ?>" method="POST">
                                <div class="form-group">
                                    <input type="password" class="form-control custom-form-control" id="pwd" name="pwd" placeholder="رمز عبور کنونی">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control custom-form-control" id="pwd_new" name="pwd_new" placeholder="رمز عبور جدید">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control custom-form-control" id="pwd_confirm" name="pwd_confirm" placeholder="تکرار رمز عبور">
                                </div>
                                <button type="submit" class="btn btn-default btn-custom-link3 custom-form-control">
                                    <span>ثبت</span>
                                </button>
                                <div class="result" style="color: coral"></div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <!-- #box4 -->
            <div class="tab-pane pwd-change" role="tabpanel" id="box5">
                <section class="box2 box-wrapper">
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-12 col-sm-6 ">
                            <h4>
                                ارتباط با مدیریت
                                <br></br>
                            </h4>
                            <form class="custom-form ajax-msg-form" action="<?= site_url('profile/user/message-to-admin') ?>" method="POST">
                                <label> متن پیام:</label>
                                <div class="form-group">
                                    <textarea rows="5" class="form-control custom-form-control" id="message" placeholder="پیام خود به زبان فارسی وارد کنید" name="message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default btn-custom-link3 custom-form-control">
                                    <span>ارسال</span>
                                </button>
                                <div class="result" style="color: coral"></div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <!-- #box5 -->

        </div>

    </section>
</main>