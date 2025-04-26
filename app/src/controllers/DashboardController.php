<?php 

namespace App\controllers;
use App\models\ProductsModel;
use PDO;

class DashboardController{
    protected $productModel;

    public function __construct(PDO $pdo){
        $this->productModel = new ProductsModel($pdo);
    }

    public function index(){
        include(__DIR__ . '/../views/dashboard/index.php');
    }
}



?>