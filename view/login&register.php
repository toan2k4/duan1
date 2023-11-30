<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Login & Register</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="wishlist.html">Wishlist</a></li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">
        <div class="row mbn-40">

            <div class="col-lg-4 col-12 mb-40">
                <div class="login-register-form-wrap">
                    <h3>Login</h3>
                    <form action="?act=login&nd=login" class="mb-30" method="post">
                        <div class="row">
                            <div class="col-12 mb-15"><input type="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="col-12 mb-15"><input type="password" placeholder="Password" name="pass"
                                    required></div>
                            <div class="col-12 d-flex justify-content-between">
                                <input type="submit" value="Login">
                                <a href="?act=quenmk">Quên mật khẩu ?</a>
                            </div>
                        </div>
                        <?php if (isset($thongbao)) {
                            echo '<div class="alert alert-danger mt-3">' . $thongbao . '</div>';
                        } ?>
                        
                    </form>
                    <h4>You can also login with...</h4>
                    <div class="social-login">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-12 mb-40 text-center d-none d-lg-block">
                <span class="login-register-separator"></span>
            </div>

            <div class="col-lg-6 col-12 mb-40 ms-auto">
                <div class="login-register-form-wrap">
                    <h3>Register</h3>
                    <form action="?act=login&nd=register" method="post">
                        <div class="row">
                            <div class="col-md-6 col-12 mb-15"><input type="text" placeholder="Your Name"
                                    name="full_name" required></div>
                            <div class="col-md-6 col-12 mb-15"><input type="text" placeholder="User Name" name="name_tk"
                                    required></div>
                            <div class="col-md-6 col-12 mb-15"><input type="email" placeholder="Email" name="email"
                                    required></div>
                            <div class="col-md-6 col-12 mb-15"><input type="password" placeholder="Password" name="pass"
                                    required></div>
                            <div class="col-md-6 col-12 mb-15"><input type="password" placeholder="Confirm Password"
                                    name="repass" required>
                            </div>
                            <div class="col-md-6 col-12"><input type="submit" value="Register"></div>
                        </div>
                        <?php if (isset($thongbaodk)) {
                            echo '<div class="alert alert-danger">' . $thongbaodk . '</div>';
                        } ?>


                    </form>
                </div>
            </div>

        </div>
    </div>
</div><!-- Page Section End -->