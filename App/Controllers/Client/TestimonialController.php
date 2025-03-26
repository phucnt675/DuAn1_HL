<?php

namespace App\Controllers\Client;

use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Testimonial\Index;

class TestimonialController{
    public static function index(){
        
        Header::render();
        Index::render();
        Footer::render();
    }
}