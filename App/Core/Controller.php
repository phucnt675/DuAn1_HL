<?php
namespace App\Core;

class Controller
{
    protected function redirect($url)
    {
        header("Location: $url");
        exit();
    }

    protected function render($view, $data = [])
    {
        extract($data);
        require "../app/Views/$view.php";
    }
}