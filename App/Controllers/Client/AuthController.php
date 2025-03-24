<?php

namespace App\Controllers\Client;

use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Register;

class AuthController{
    public static function login(){
        
        Header::render();
        Login::render();
        Footer::render();
    }

    public static function register(){
        
        Header::render();
        Register::render();
        Footer::render();
    }
}