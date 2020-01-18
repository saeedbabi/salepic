<?php
//var_dump($shooters);
?>

<main id="user-profile-page" class="container-fluid">
    <section id="user-top-section" class="row">
        <article class="text-center col-sm-4">
            <h1> سعید بابایی </h1>
        </article>
        <article class="col-sm-4">
            <img src="<?= asset('assets/images/photographer/Ice-Boy.jpg') ?>" class="img-responsive img-circle user-img" />
        </article>

    </section>

    <section id="user-nav-section" class="row">

        <ul class="nav nav-pills nav-justified" role="tablist">

            <li class="nav-item active">
                <a class="nav-link" data-target="#box1" data-toggle="tab"> دسته بندی جدید

                    <span class="fas fa-th-list"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#box2" data-toggle="tab"> مشخصات عکاسان

                    <span class="fa fa-user-circle-o"></span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-target="#box3" data-toggle="tab"> مشخصات کاربران

                    <span class="fa fa-list-alt"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#box4" data-toggle="tab"> ارسال پیام به کاربران
                    <span class="fa fa-paper-plane-o" aria-hidden="true"></span>
                </a>
            </li>
        </ul>

    </section>

    <section id="user-main-section" class="row">
        <div class="tab-content float-right box-content">
            <div class="tab-pane user-info-wrapper active" role="tabpanel" id="box1">

                <section class="box1 box-wrapper">
                    <article class="box-item flex-box">
                        <!--<article class="flex-box-inner">-->
                        <div class="flex-item">
                            <h4>دسته بندی جدید:</h4>
                            <form class=" custom-form ajax-form" action="<?= admin_url('/category/ajaxSave') ?>" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control custom-form-control" name="name" placeholder="نام دسته بندی">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control custom-form-control" name="slug" placeholder="Slug">
                                </div>

                                <button type="submit" class="btn btn-default btn-custom-link3 custom-form-control">ثبت</button>
                                <div class="result"></div>
                            </form>
                        </div>
                        <!--</article>-->

                        <div class="flex-item">
                            <h4> ویرایش دسته بندی:</h4>
                            <div class="card-box">
                                <div class="bg-white table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">ردیف</th>
                                                <th scope="col">نام</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col">عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($categories as $key => $category) : ?>

                                                <tr>
                                                    <td><?= $category->id ?> </td>
                                                    <td><?= $category->name ?> </td>
                                                    <td> <?= $category->slug ?> </td>
                                                    <td><a href=' <?= admin_url("/category/delete?id={$category->id}") ?>'>
                                                            <i class="fas fa-trash"> </i></a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>


                            </div>
                        </div>

                    </article>
                </section>
            </div>
            <!-- #box1 -->
            <div class="tab-pane user-info-wrapper" role="tabpanel" id="box2">

                <section class="box2 box-wrapper">
                    <article class="flex-box">
                        <!--<article class="flex-box-inner">-->
                        <h4></h4>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">تصویر</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">ایمیل</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($shooters->records as $key => $shooter) : ?>

                                    <tr>
                                        <td><?= $key + 1 ?> </td>
                                        <td><img src=" <?= $shooter->picture ?>" alt="عکس" class="img-responsive1"> </td>
                                        <td><?= $shooter->name ?> </td>
                                        <td> <?= $shooter->email ?> </td>
                                        <td>فعال</td>
                                        <td><a href=" <?= admin_url('/photographers/delete?id=' . $shooter->id) ?>">
                                                <i class="fas fa-trash"> </i></a></td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                        <!--</article>-->



                    </article>
                </section>
                <!--.box-wrapper-->
                <div class="pagination-wrapper">
                    <ul class="pagination">
                        <?php for ($p = 1; $p <= $shooters->page_count; $p++) : ?>
                            <li><a href="<?= admin_url("?page={$p}") ?>"><?= $p ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>

            <!-- #box2 -->

            <div class="tab-pane user-info-wrapper" role="tabpanel" id="box3">

                <section class="box3 box-wrapper">
                    <article class="flex-box">
                        <!--<article class="flex-box-inner">-->
                        <h4></h4>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">تصویر</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">ایمیل</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($users->records as $key => $user) : ?>

                                    <tr>
                                        <td><?= $key + 1 ?> </td>
                                        <td><img src=" <?= $user->picture ?>" alt="عکس" class="img-responsive1"></td>
                                        <td><?= $user->name ?> </td>
                                        <td> <?= $user->email ?> </td>
                                        <td>فعال</td>
                                        <td><a href=" <?= admin_url('/user/delete?id=' . $user->id) ?>">
                                                <i class="fas fa-trash"> </i></a></td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                        <!--</article>-->



                    </article>
                </section>
                <!--.box-wrapper-->
                <div class="pagination-wrapper">
                    <ul class="pagination">
                        <?php for ($p = 1; $p <= $users->page_count; $p++) : ?>
                            <li><a href="<?= admin_url("?page={$p}") ?>"><?= $p ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>


            <!-- #box3 -->
            <div class="tab-pane pwd-change" role="tabpanel" id="box4">
                <section class="box2 box-wrapper">
                    <div class="row">
                        <div class="col-sm-offset-3 col-xs-12 col-sm-6 ">
                            <br></br>
                            <form class="custom-form ajax-admin-msg-form" action="<?= site_url('admin/message') ?>" method="POST">
                                <label> متن پیام:</label>
                                <div class="form-group">
                                    <textarea rows="5" class="form-control custom-form-control" id="message" placeholder="پیام خود را وارد کنید" name="message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default btn-custom-link3 custom-form-control">
                                    <span>ارسال</span>
                                </button>
                                <div class="result"></div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <!-- #box4 -->

        </div>

    </section>
</main>