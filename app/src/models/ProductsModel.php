<?php 
namespace App\models;
use PDO;

class ProductsModel{
    protected $conn;

    public function __construct(PDO $pdo){
        $this->conn = $pdo;
    }
    
    public function getNewProducts(){
        $sql = 'SELECT products.id_product, categorys.category_name, products.product_name, products.product_description, products.products_price, products.products_stock, products.product_image FROM products JOIN categorys ON products.product_category = categorys.id_category ORDER BY products.created_at DESC LIMIT 3';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getAllProducts(){
        $sql = "SELECT products.id_product, categorys.category_name, products.product_name, products.product_description, products.products_price, products.products_stock, products.product_image FROM products JOIN categorys ON products.product_category = categorys.id_category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}


?>