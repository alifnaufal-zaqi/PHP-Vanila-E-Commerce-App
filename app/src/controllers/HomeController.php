<?php
namespace App\controllers;
use App\models\ProductsModel;
use PDO;

class HomeController{
    protected $productModel;

    public function __construct(PDO $pdo){
        $this->productModel = new ProductsModel($pdo);
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
}
?>