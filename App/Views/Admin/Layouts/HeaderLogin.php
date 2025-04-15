<?php

namespace App\Views\Admin\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;
use App\Models\User;

class HeaderLogin extends BaseView
{
    public static function render($data = null)
    {

        $is_login = AuthHelper::checkLogin();
        $usersModel = new User();
        $user = $usersModel->getOneUser($is_login);

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>SB Admin 2 - Dashboard</title>

            <!-- Custom fonts for this template-->
            <link href="/public/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link
                href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">

            <!-- Custom styles for this template-->
            <link href="/public/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

            <!-- Custom styles for this page -->
            <link href="/public/assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


        </head>

        
                <?php

            }
        }

                ?>