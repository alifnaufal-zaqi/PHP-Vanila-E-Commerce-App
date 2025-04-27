<?php 
namespace App\models;
use PDO;

class ProductsModel{
    protected $conn;

    public function __construct(PDO $pdo){
        $this->conn = $pdo;
    }

    public function createProduct($productName, $porductCategory, $productDescription, $productPrice, $productStock, $productImage){
        $sql = "INSERT INTO products VALUES (:idProduct, :productCategory, :productName, :productDescription, :productPrice, :productStock, :productImage)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':idProduct' => uniqid('product-'),
            ':productCategory' => $porductCategory,
            ':productName' => $productName,
            ':productDescription' => $productDescription,
            ':productPrice' => $productPrice,
            ':productStock' => $productStock,
            ':productImage' => $productImage,
        ]);
    }

    public function getProductById($idProduct){
        $sql = "SELECT * FROM products WHERE id_product = :idProduct";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':idProduct' => $idProduct,
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getNewProducts(){
        $sql = 'SELECT products.id_product, categorys.category_name, products.product_name, products.product_description, products.products_price, products.products_stock, products.product_image FROM products JOIN categorys ON products.product_category = categorys.id_category ORDER BY products.created_at DESC LIMIT 3';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllProducts($limit, $offset){
        $sql = "SELECT products.id_product, categorys.category_name, products.product_name, products.product_description, products.products_price, products.products_stock, products.product_image FROM products JOIN categorys ON products.product_category = categorys.id_category LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':limit' => $limit,
            ':offset' => $offset,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateProductById($idProduct, $productName, $porductCategory, $productDescription, $productPrice, $productStock, $productImage){
        $sql = "UPDATE products SET product_name = :productName, product_category = :productCategory, product_description = :productDescription, products_price = :productPrice, products_stock = :productStock, product_image = :productImage WHERE id_product = :idProduct";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':productName' => $productName,
            ':productCategory' => $porductCategory,
            ':productDescription' => $productDescription,
            ':productPrice' => $productPrice,
            ':productStock' => $productStock,
            ':productImage' => $productImage,
            ':idProduct' => $idProduct,
        ]);
    }

    public function deleteProductById($idProduct){
        $sql = "DELETE FROM products WHERE id_product = :idProduct";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':idProduct' => $idProduct,
        ]);
    }

    public function getProductCount(){
        $sql = "SELECT COUNT(*) AS product_count FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countProduct(){
        $sql = "SELECT COUNT(*) FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function searchProduct($keyword){
        $sql = "SELECT products.id_product, categorys.category_name, products.product_name, products.product_description, products.products_price, products.products_stock, products.product_image FROM products JOIN categorys ON products.product_category = categorys.id_category WHERE products.product_name LIKE :keyword";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':keyword' => "%$keyword%",
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>