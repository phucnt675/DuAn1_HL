<?php

namespace App\Views\Admin\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {
?>




        <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">Đăng nhập Admin</h3>
                                <form action="/admin/login" method="post">
                                    <input type="hidden" name="method" value="POST">
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="email">Email</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Mật khẩu</label>
                                    </div>

                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="" name="remember" />
                                        <label class="form-check-label" for="form1Example3"> Ghi nhớ đăng nhập </label>
                                    </div>

                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Đăng nhập</button>
                                </form>
                                <hr class="my-4">

                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                                    type="submit"><i class="fab fa-google me-2"></i> Đăng ký với google</button>
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                                    type="submit"><i class="fab fa-facebook-f me-2"></i>Đăng ký với facebook</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



<?php

    }
}
