<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{
	public static function render($data = null)
	{
?>
		<!-- <div class="container">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <div class="card">
                        <form class="form">
                            <h2 class="text-center">Login</h2>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                    <label class="custom-control-label" for="rememberMe">Remember me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->


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
							Login
						</span>
						<form class="login100-form validate-form" action="/login" method="post">
							<input type="hidden" name="method" value="POST">
							<div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
								<span class="label-input100">Username</span>
								<input class="input100" type="text" name="username" id="username" placeholder="Type your username">
								<span class="focus-input100" data-symbol="&#xf206;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Password is required">
								<span class="label-input100">Password</span>
								<input class="input100" type="password" name="password" id="password" placeholder="Type your password">
								<span class="focus-input100" data-symbol="&#xf190;"></span>
							</div>

							<div class="text-right p-t-8 p-b-31">
								<a href="/forgot-password">
									Forgot password?
								</a>
							</div>

							<div class="container-login100-form-btn">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button class="login100-form-btn">
										Login
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
								<a href="/register" class="txt2">
									Sign Up
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
