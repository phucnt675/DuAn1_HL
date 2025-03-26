<?php

namespace App\Controllers\Client;

use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Contact\Index;

class ContactController{
    public static function index(){
        Header :: render();
        Index ::render();
        Footer ::render();
    }
}