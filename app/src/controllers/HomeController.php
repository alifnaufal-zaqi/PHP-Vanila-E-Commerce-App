<?php
namespace App\controllers;
use App\models\ProductsModel;
use App\models\UserModel;
use PDO;

class HomeController{
    protected $productModel;
    protected $userModel;

    public function __construct(PDO $pdo){
        $this->productModel = new ProductsModel($pdo);
        $this->userModel = new UserModel($pdo);
    }

    public function profileUser(){
        session_start();

        $idUser = $_SESSION['user']['id_user'];
        $user = $this->userModel->getUserLogged($idUser);

        include(__DIR__ . '/../views/home/profile/index.php');
    }

    public function index(){
        $limit = 20;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $products = $this->productModel->getAllProducts($limit, $offset);
        $totalProduct = $this->productModel->countProduct();

        $totalPage = ceil($totalProduct / $limit);

        include(__DIR__ . '/../views/home/products/index.php');
    }

    public function detailProduct($idProduct){
        $product = $this->productModel->getDetailProduct($idProduct);

        include(__DIR__ . '/../views/home/products/detail.php');
    }
}
?>