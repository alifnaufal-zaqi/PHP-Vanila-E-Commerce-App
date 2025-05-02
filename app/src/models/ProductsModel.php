<?php 
namespace App\models;
use PDO;
use App\core\Model;

class ProductsModel extends Model{
    public function __construct(PDO $pdo){
        parent::__construct($pdo);
    }

    public function createProduct($productName, $porductCategory, $productDescription, $productPrice, $productStock, $productImage){
        $this->builder
            ->insert('products', [
                'id_product' => uniqid('product-'),
                'product_category' => $porductCategory,
                'product_name' => $productName,
                'product_description' => $productDescription,
                'products_price' => $productPrice,
                'products_stock' => $productStock,
                'product_image' => $productImage,
            ])
            ->execute();
    }

    public function getDetailProduct($idProduct){
        $data = $this->builder
                    ->select('products.id_product, categorys.category_name, products.product_name, products.product_description, products.products_price, products.product_image')
                    ->from('products')
                    ->join('categorys', 'products.product_category = categorys.id_category')
                    ->where('id_product = ?')
                    ->find([$idProduct]);

        return $data;
    }

    public function getProductById($idProduct){
        $data = $this->builder
                    ->select()
                    ->from('products')
                    ->where('id_product = ?')
                    ->find([$idProduct]);

        return $data;
    }
    
    public function getNewProducts(){
        $data = $this->builder
                    ->select('products.id_product, categorys.category_name, products.product_name, products.product_description, products.products_price, products.products_stock, products.product_image')
                    ->from('products')
                    ->join('categorys', 'products.product_category = categorys.id_category')
                    ->orderBy('products.created_at', 'DESC')
                    ->limit(3)
                    ->findAll();

        return $data;
    }

    public function getAllProducts($limit, $offset){
        $data = $this->builder
                    ->select('products.id_product, categorys.category_name, products.product_name, products.product_description, products.products_price, products.products_stock, products.product_image')
                    ->from('products')
                    ->join('categorys', 'products.product_category = categorys.id_category')
                    ->limit($limit)
                    ->offset($offset)
                    ->findAll();
        
        return $data;
    }

    public function updateProductById($idProduct, $productName, $porductCategory, $productDescription, $productPrice, $productStock, $productImage){
        $this->builder
            ->update('products', [
                'product_name' => $productName,
                'product_category' => $porductCategory,
                'product_description' => $productDescription,
                'products_price' => $productPrice,
                'products_stock' => $productStock,
                'product_image' => $productImage,
            ], ['id_product' => $idProduct])
            ->execute();
    }

    public function deleteProductById($idProduct){
        $this->builder
            ->delete('products', [
                'id_product' => $idProduct,
            ])
            ->execute();
    }

    public function getProductCount(){
        $data = $this->builder
                    ->querys('SELECT COUNT(*) AS product_count FROM products')
                    ->find();

        return $data;
    }

    public function countProduct(){
        $data = $this->builder
                    ->querys('SELECT COUNT(*) FROM products')
                    ->findColumn();

        return $data;
    }

    public function searchProduct($keyword){
        $products = $this->builder
                        ->select('products.id_product, categorys.category_name, products.product_name, products.product_description, products.products_price, products.products_stock, products.product_image')
                        ->from('products')
                        ->join('categorys', 'products.product_category = categorys.id_category')
                        ->like('products.product_name', $keyword)
                        ->findAll();

        return $products;
    }
}


?>