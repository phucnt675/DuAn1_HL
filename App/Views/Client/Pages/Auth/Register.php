<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{

    public static function render($data = null)
    {
?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Login V4</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!--===============================================================================================-->
            <link rel="icon" type="image/png" href="public/assets/client/Login/images/icons/favicon.ico" />
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="public/assets/client/Login/vendor/bootstrap/css/bootstrap.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="public/assets/client/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="public/assets/client/Login/fonts/iconic/css/material-design-iconic-font.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="public/assets/client/Login/vendor/animate/animate.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="public/assets/client/Login/vendor/css-hamburgers/hamburgers.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="public/assets/client/Login/vendor/animsition/css/animsition.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="public/assets/client/Login/vendor/select2/select2.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="public/assets/client/Login/vendor/daterangepicker/daterangepicker.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="public/assets/client/Login/css/util.css">
            <link rel="stylesheet" type="text/css" href="public/assets/client/Login/css/main.css">
            <!--===============================================================================================-->
        </head>

        <body>

            <div class="limiter">
                <div class="container-login100" style="background-image: url('public/assets/client/Login/images/background.jpg');">
                    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                        <span class="login100-form-title p-b-49">
                            Register
                        </span>
                        <form class="login100-form validate-form" action="/register" method="post">
                            <input type="hidden" name="method" value="POST" id="">
                            <div class="row">
                                <div class="col-6">
                                    <div class="wrap-input100 validate-input m-b-23" data-validate="Vui lòng nhập Username">
                                        <span class="label-input100">Username</span>
                                        <input class="input100" type="text" name="username" id="username" placeholder="Nhập Username">
                                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-23" data-validate="Vui lòng nhập Họ tên">
                                        <span class="label-input100">Full Name</span>
                                        <input class="input100" type="name" name="name" id="name" placeholder="Nhập Họ tên">
                                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-23" data-validate="Vui lòng nhập Email">
                                        <span class="label-input100">Email</span>
                                        <input class="input100" type="email" name="email" id="email" placeholder="Nhập Email">
                                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="wrap-input100 validate-input m-b-23" data-validate="Vui lòng nhập SĐT">
                                        <span class="label-input100">Phone</span>
                                        <input class="input100" type="phone" name="phone" id="phone" placeholder="Nhập SĐT">
                                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-23" data-validate="Vui lòng nhập Mật khẩu">
                                        <span class="label-input100">Mật khẩu</span>
                                        <input class="input100" type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                                    </div>
                                    <div class="wrap-input100 validate-input m-b-23" data-validate="Vui lòng nhập lại mật khẩu">
                                        <span class="label-input100">Nhập lại mật khẩu</span>
                                        <input class="input100" type="password" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu">
                                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right p-t-8 p-b-31">
                                <a href="/App/Views/Client/Pages/Auth/ResetPassword.php">
                                    Forgot password?
                                </a>
                            </div>

                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button type="submit" class="login100-form-btn">
                                        Register
                                    </button>
                                </div>
                            </div>

                            <div class="txt1 text-center p-t-54 p-b-20">
                                <span>
                                    Or Sign Up Using
                                </span>
                            </div>

                            <div class="flex-c-m">
                                <a href="#" class="login100-social-item bg1">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="#" class="login100-social-item bg2">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="#" class="login100-social-item bg3">
                                    <i class="fa fa-google"></i>
                                </a>
                            </div>

                            <div class="flex-col-c p-t-155">
                                <span class="txt1 p-b-17">
                                    Or Sign Up Using
                                </span>

                                <a href="/login" class="txt2">
                                    Sign In
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div id="dropDownSelect1"></div>

            <!--===============================================================================================-->
            <script src="public/assets/client/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
            <!--===============================================================================================-->
            <script src="public/assets/client/Login/vendor/animsition/js/animsition.min.js"></script>
            <!--===============================================================================================-->
            <script src="public/assets/client/Login/vendor/bootstrap/js/popper.js"></script>
            <script src="public/assets/client/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
            <!--===============================================================================================-->
            <script src="public/assets/client/Login/vendor/select2/select2.min.js"></script>
            <!--===============================================================================================-->
            <script src="public/assets/client/Login/vendor/daterangepicker/moment.min.js"></script>
            <script src="public/assets/client/Login/vendor/daterangepicker/daterangepicker.js"></script>
            <!--===============================================================================================-->
            <script src="public/assets/client/Login/vendor/countdowntime/countdowntime.js"></script>
            <!--===============================================================================================-->
            <script src="public/assets/client/Login/js/main.js"></script>

        </body>

        </html>
<?php
    }
}
