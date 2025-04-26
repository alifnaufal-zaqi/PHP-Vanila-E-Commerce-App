<?php
use App\controllers\DashboardController;
use App\controllers\UserController;
use App\controllers\LandingController;
require_once __DIR__ . '/../db/database.php';

$userController = new UserController($pdo);
$landingController = new LandingController($pdo);
$dashboardController = new DashboardController($pdo);

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$baseUri = '/e-commerce/app/public';
$path = trim(str_replace($baseUri, '', $requestUri));

switch($path){
    case '/':
        $landingController->index();
        break;
    case '/auth/register':
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $userController->storeUser();
        }else{
            $userController->register();
        }
        break;
    case '/auth/login':
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $userController->verifyUserCredential();
        }else{
            $userController->login();
        }
        break;
    case '/dashboard':
        $dashboardController->index();
}

?>