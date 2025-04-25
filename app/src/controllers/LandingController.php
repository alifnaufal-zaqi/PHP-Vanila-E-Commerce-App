<?php
namespace App\controllers;

class LandingController{
    public static function index(){
        include(__DIR__ . '/../views/landing.php');
    }
}

?>