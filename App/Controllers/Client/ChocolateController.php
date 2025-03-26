<?php


namespace App\Controllers\Client;

use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Chocolate\Index;
use App\Views\Client\Pages\Auth\Register;

class ChocolateController{
    public static function index(){
        
        Header::render();
        Index::render();
        Footer::render();
    }
}