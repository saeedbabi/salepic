<?php

?>

<div id="user-info-edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"> ویرایش مشخصات </h3>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('profile/user/edit') ?>" method="post" class="custom-form ajax-form">
                    <div class="form-group">
                        <input type="text" class="form-control custom-form-control" id="name" name="name" placeholder="نام">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control custom-form-control" id="mobile" name="mobile" placeholder="تلفن همراه">
                    </div>
                    <div class="form-group">
                        <select class="form-control custom-form-control" id="country" name="gender">
                            <option value="0">مرد</option>
                            <option value="1">زن</option>
                        </select>

                    </div>
                    <button type="submit" id="removemodal" class="btn btn-default btn-custom-link3 custom-form-control">
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
            <h1> <?= $userinfo[0]->name ?> </h1>
        </article>
        <article class="col-sm-4">
            <img src="<?= $userinfo[0]->picture ?>" class="img-responsive img-circle user-img" />
        </article>
        <article class="text-center col-sm-4">
            <div class="user-rate">
                <i class="fa fa-star not-filled"></i>
                <i class="fa fa-star not-filled"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </article>

    </section>

    <section id="user-nav-section" class="row">

        <ul class="nav nav-pills nav-justified" role="tablist">


            <li class="nav-item">
                <a class="nav-link" data-target="#box1" data-toggle="tab"> مشخصات من

                    <span class="fa fa-user-circle-o"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#box2" data-toggle="tab"> تغییر رمز عبور

                    <span class="fa fa-lock"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#box3" data-toggle="tab"> ارتباط با مدیریت
                    <span class="fa fa-paper-plane-o" aria-hidden="true"></span>
                </a>
            </li>
        </ul>

    </section>

    <section id="user-main-section" class="row">

        <div class="tab-content float-right box-content">
            <div class="tab-pane upload-img active" role="tabpanel" id="box1">

                <section class="box1 box-wrapper">
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
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-label"> تلفن همراه:</div>
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-value"><?= $userinfo[0]->mobile ?></div>
                            </div>
                            <div class="user-info-row">
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-label"> جنسیت:</div>
                                <div class="col-lg-6 col-sm-6 col-xs-12 info-value"> <?= \App\Enums\FileEnum::gender_type[$userinfo[0]->gender] ?? '' ?></div>
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
            <!-- #box1 -->

            <div class="tab-pane pwd-change" role="tabpanel" id="box2">
                <section class="box2 box-wrapper">
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-12 col-sm-6">
                            <h3>
                                تغییر رمزعبور:
                            </h3>
                            <form class="custom-form ajax-form" action="<?= site_url('profile/user/edit-pass') ?>" method="POST">
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
            <!-- #box2 -->
            <div class="tab-pane pwd-change" role="tabpanel" id="box3">
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
            <!-- #box3 -->

        </div>

    </section>
</main>