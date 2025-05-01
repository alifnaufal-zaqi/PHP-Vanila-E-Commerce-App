<?php
use App\controllers\DashboardController;
use App\controllers\HomeController;
use App\controllers\UserController;
use App\controllers\LandingController;
require_once __DIR__ . '/../db/database.php';

$userController = new UserController($pdo);
$landingController = new LandingController($pdo);
$dashboardController = new DashboardController($pdo);
$homeController = new HomeController($pdo);

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
        break;
    case '/dashboard/products':
        $keyword = $_GET['keyword'] ?? null;
        if($keyword){
            $dashboardController->searchingProduct($keyword);
        }else{
            $dashboardController->products();
        }
        break;
    case '/dashboard/products/create':
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dashboardController->saveProduct();
        }else{
            $dashboardController->createProduct();
        }
        break;
    case (preg_match('/\/dashboard\/products\/delete\/([a-zA-Z0-9\-]+)/', $path, $matches) ? true : false):
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $idProduct = $matches[1];
            $dashboardController->deleteProduct($idProduct);
        }else{
            header('Location: /dashboard/products');
            exit;
        }
        break;
    case (preg_match('/\/dashboard\/products\/update\/([a-zA-Z0-9\-]+)/', $path, $matches) ? true : false):
        $idProduct = $matches[1];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dashboardController->modifyProduct($idProduct);
        }else{
            $dashboardController->updateProduct($idProduct);
        }
        break;
    case '/dashboard/transactions':
        $dashboardController->transactions();
        break;
    case (preg_match('/\/dashboard\/transactions\/([a-zA-Z0-9\-]+)/', $path, $matches) ? true : false):
        $idTransaction = $matches[1];
        $dashboardController->detailTransaction($idTransaction);
        break;
    case '/dashboard/users':
        $dashboardController->users();
        break;
    case (preg_match('/\/dashboard\/users\/([a-zA-Z0-9\-]+)/', $path, $matches) ? true : false):
        $idUser = $matches[1];
        $dashboardController->userDetail($idUser);
        break;
    case '/logout':
        $dashboardController->logout();
        break;
    case '/home':
        $homeController->index();
        break;
}

?>