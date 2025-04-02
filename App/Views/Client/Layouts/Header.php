<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
  public static function render($data = null)
  {


?>


    <!DOCTYPE html>
    <html>

    <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />

      <title>ChocoLux</title>


      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="public/assets/client/css/bootstrap.css" />
      <!--slick slider stylesheet -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

      <!-- fonts style -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
      <!-- slick slider -->

      <link rel="stylesheet" href="public/assets/client/css/slick-theme.css" />
      <!-- font awesome style -->
      <link href="public/assets/client/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="public/assets/client/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="public/assets/client/css/responsive.css" rel="stylesheet" />

    </head>

    <body>

      <div class="main_body_content">

        <div class="hero_area">
          <!-- header section strats -->
          <header class="header_section">
            <div class="container-fluid">
              <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="/">
                  ChocoLux
                </a>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/about"> About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/chocolate">Chocolates</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/testimonial">Testimonial</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/register">Register</a>
                    </li>
                  </ul>
                  <div class="quote_btn-container">
                    <form class="form-inline">
                      <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                      </button>
                    </form>
                    <a href="">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </nav>
            </div>
          </header>
          <!-- end header section -->

      </div>
  <?php

  }
}

  ?>