<header>
    <?php

    use App\Services\Auth\Auth;


    if (!Auth::isLogin()) : ?>
        <div id="quick-sign-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">SalePic</h4>
                    </div>
                    <div class="modal-body">

                        <p class="modal-txt">ورود کاربران:</p>

                        <form class="custom-form ajax-auth-form" action="<?= site_url('user/login') ?>" method="POST">
                            <div class="form-group">
                                <input type="email" class="form-control custom-form-control" id="user_email" name="user_email" placeholder="ایمیل" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control custom-form-control" id="user_pwd" name="user_pwd" placeholder="رمز عبور" required>
                            </div>
                            <div class="form-group">
                                <a href="<?= site_url('forgetPass') ?>">فراموشی رمز عبور</a>
                                <button style="float:left" type=" submit" class="btn btn-default btn-custom-link3 custom-form-control">
                                    <span>ورود</span>
                                </button>
                            </div>
                            <div class="result" style="color:coral"></div>
                        </form>

                        <p class="modal-txt sign-up-txt">ثبت نام:</p>

                        <form class="custom-form ajax-auth-form" action="<?= site_url('user/register') ?>" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control custom-form-control" id="name" name="name" placeholder="نام : به شکل فارسی تایپ شود" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control custom-form-control" id="email" name="email" placeholder="ایمیل" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control custom-form-control" id="password" name="password" placeholder="رمز عبور : حداقل ۶ کاراکتر و شامل یکی از علامتهای @#$ باشد" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control custom-form-control" id="mobile" name="mobile" placeholder="موبایل : حتما ۱۱ رقم و به شکل لاتین وارد شود" required>
                            </div>
                            <div class="form group">
                                <label for="radiobutton1">
                                    <input type="radio" id="radiobutton1" name="userType" value="photographer"> عکاس
                                </label>

                                <label for="radiobutton2">
                                    <input type="radio" id="radiobutton2" name="userType" value="user"> کاربر عادی </label>
                                <button style="float:left" type="submit" class="btn btn-default btn-custom-link3 custom-form-control">
                                    ثبت نام
                                </button>
                            </div>

                            <div class="result" style="color:coral"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>
    <div id="main-nav-wrapper">
        <nav id="main-nav" class="navbar navbar-inverse" data-spy="affix" data-offset-top="50">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= site_url('') ?>"><img src="<?= asset('assets/images/logo.png') ?>" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="myNav">
                    <ul class="nav navbar-nav ul-lvl1">
                        <li><a href="<?= site_url('') ?>"></i>صفحه اصلی</a></li>
                        <li><a href="<?= site_url('contact') ?>"><i class="fa fa-phone fa-custom"></i> تماس با ما </a></li>
                        <li><a href="<?= site_url('about') ?>"><i class="fa fa-info-circle fa-custom"></i> درباره ما </a></li>
                        <!--<li><a class="cart-icon" href="<//?= site_url('cart') ?>">
                                <span class="fas fa-shopping-cart"></span>
                                <span class="count">3</span>
                            </a></li>-->

                    </ul>

                    <ul class="nav navbar-nav navbar-left" style="margin-left:40px;">
                        <?php if (!Auth::isLogin()) : ?>
                            <li><a id="quick-sign-in-up" role="button" href data-toggle="modal" data-target="#quick-sign-modal">
                                    ورود/ثبت نام</i></a>
                            </li>
                        <?php endif; ?>


                        <?php if (Auth::isLogin()) : ?>
                            <li class="dropdown drop-li-lvl1">
                                <a class="dropdown-toggle" data-toggle="dropdown" href>
                                    پنل کاربری
                                </a>
                                <i class="fa fa-caret-up up-caret1"></i>
                                <ul class="dropdown-menu drop-ul-lvl2">
                                    <?php if (!Auth::isAdminUser()) : ?>
                                        <li><a class="dropdown-item" href="<?= site_url('profile/user') ?>">پروفایل کاربری<?= Auth::isAdminUser() ?></a></li>
                                    <?php endif; ?>
                                    <?php if (Auth::isAdminUser()) : ?>
                                        <li><a class="dropdown-item" href="<?= site_url('admin') ?>">پنل مدیریت</a></li>
                                    <?php endif; ?>
                                    <li><a class="dropdown-item" href="<?= site_url('user/logout') ?>">خروج</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>