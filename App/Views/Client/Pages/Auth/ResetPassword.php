<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ResetPassword extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Code giao diện -->
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
                            Đặt Lại Mật Khẩu
                        </span>
                        <form action="/reset-password" method="post">
                            <input type="hidden" name="method" value="PUT">

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

                            <div class="container-login100-form-btn">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button type="reset" class="login100-form-btn">
										Nhập lại
									</button>
								</div>
							</div>
                            <br>
                            <div class="container-login100-form-btn">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button type="submit" class="login100-form-btn">
										Đặt lại mật khẩu 
									</button>
								</div>
							</div>
                            <br>
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
