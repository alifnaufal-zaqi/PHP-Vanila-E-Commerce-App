<?php 

namespace App\controllers;
use App\models\CategorysModel;
use App\models\ProductsModel;
use App\models\TransactionItemsModel;
use App\models\TransactionsModel;
use App\models\UserModel;
use PDO;

class DashboardController{
    protected $productModel;
    protected $userModel;
    protected $categoryModel;
    protected $transactionModel;
    protected $transactionItemModel;

    public function __construct(PDO $pdo){
        $this->productModel = new ProductsModel($pdo);
        $this->userModel = new UserModel($pdo);
        $this->categoryModel = new CategorysModel($pdo);
        $this->transactionModel = new TransactionsModel($pdo);
        $this->transactionItemModel = new TransactionItemsModel($pdo);
    }

    public function index(){
        $productCount = $this->productModel->getProductCount();
        $userCount = $this->userModel->getUserCount();
        $transactionCount = $this->transactionModel->getTransactionCount();
        include(__DIR__ . '/../views/dashboard/index.php');
    }

    public function products(){
        $limit = 3;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $products = $this->productModel->getAllProducts($limit, $offset);
        $totalProducts = $this->productModel->countProduct();

        $totalPage = ceil($totalProducts / $limit);

        include(__DIR__ . '/../views/dashboard/products/index.php');
    }

    public function searchingProduct($keyword){
        $products = $this->productModel->searchProduct($keyword);
        include(__DIR__ . '/../views/dashboard/products/index.php');
    }

    public function createProduct(){
        $categorys = $this->categoryModel->getAllCategorys();
        include(__DIR__ . '/../views/dashboard/products/create.php');
    }

    public function saveProduct(){
        session_start();

        $productName = $_POST['product-name'];
        $productCategory = (int)$_POST['product-category'];
        $productDescription = $_POST['product-description'];
        $productPrice = (int)$_POST['product-price'];
        $productStock = (int)$_POST['product-stock'];
        $productTmpPath = $_FILES['product-image']['tmp_name'];
        $productImage = $_FILES['product-image']['name'];

        // Get Extensions File
        $extension = pathinfo($productImage, PATHINFO_EXTENSION);

        // Create New Filename With Uniq Name
        $newFileName = 'product-' . time() . '-' . rand(1000,9999) . '.' . $extension;

        // Path Destination Uploads
        $uploadDir = __DIR__ . '/../../public/assets/uploads/';
        $destinationPath = $uploadDir . $newFileName;

        // Path Image To Save On Database
        $savePath = "/assets/uploads/$newFileName";

        move_uploaded_file($productTmpPath, $destinationPath);

        $this->productModel->createProduct($productName, $productCategory, $productDescription, $productPrice, $productStock, $savePath);
        $_SESSION['success_create_product'] = 'Success Added New Product';

        header('Location: /dashboard/products');
        exit;
    }

    public function updateProduct($idProduct){
        $product = $this->productModel->getProductById($idProduct);
        $categorys = $this->categoryModel->getAllCategorys();
        include(__DIR__ . '/../views/dashboard/products/update.php');
    }

    public function modifyProduct($idProduct){
        $productName = $_POST['product-name'];
        $productCategory = (int)$_POST['product-category'];
        $productDescription = $_POST['product-description'];
        $productPrice = (int)$_POST['product-price'];
        $productStock = (int)$_POST['product-stock'];

        $product = $this->productModel->getProductById($idProduct);

        if($product){
            $savePath = $product['product_image'];

            if(!empty($_FILES['product-image']['name'])){
                $productTmpPath = $_FILES['product-image']['tmp_name'];
                $productImage = $_FILES['product-image']['name'];

                $oldPath = __DIR__ . '/../../public' . $product['product_image'];
    
                if(file_exists($oldPath)){
                    unlink($oldPath);
                }

                // Get Extensions File
                $extension = pathinfo($productImage, PATHINFO_EXTENSION);
    
                // Create New Filename With Unique Name
                $newFileName = 'product-' . time() . '-' . rand(1000,9999) . '.' . $extension;
    
                // Path Destination Uploads
                $uploadDir = __DIR__ . '/../../public/assets/uploads/';
                $destinationPath = $uploadDir . $newFileName;

                if(move_uploaded_file($productTmpPath, $destinationPath)){
                    // Path Image To Save On Database
                    $savePath = "/assets/uploads/$newFileName";
                }else{
                    $_SESSION['error_update_product'] = 'Failed to upload image';
                    header("Location: /dashboard/products/update/" . $product['product-image']);
                    exit;
                }
            }

            $this->productModel->updateProductById(
                $idProduct,
                 $productName,
                  $productCategory, 
                  $productDescription, 
                  $productPrice, 
                  $productStock, 
                  $savePath
            );

            $_SESSION['success_update_product'] = 'Success Update Product';

            header('Location: /dashboard/products');
            exit;
        }
    }

    public function deleteProduct($idProduct){
        $selectedProduct = $this->productModel->getProductById($idProduct);

        if($selectedProduct){
            $imagePath = __DIR__ . '/../../public' . $selectedProduct['product_image'];

            if(file_exists($imagePath)){
                unlink($imagePath);
            }

            $this->productModel->deleteProductById($idProduct);
        }

        header('Location: /dashboard/products');
        exit;
    }

    public function transactions(){
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
        
        $transactions = $this->transactionModel->getAllTransactions($limit, $offset);
        $totalTransactions = $this->transactionModel->transactionCount();

        $totalPage = ceil($totalTransactions / $limit);
        
        include(__DIR__ . '/../views/dashboard/transactions/index.php');
    }

    public function detailTransaction($idTransaction){
        $limit = 4;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $totalTransactionItems = $this->transactionItemModel->transactionItemCount();
        $transactionItems = $this->transactionItemModel->getPurchasedProductsByTransactionId($idTransaction, $limit, $offset);
        $transaction = $this->transactionModel->getTransactionById($idTransaction);

        $totalPage = ceil($totalTransactionItems / $limit);

        include(__DIR__ . '/../views/dashboard/transactions/detail.php');
    }

    public function users(){
        $limit = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $users = $this->userModel->getUsersInfo($limit, $offset);
        $totalUser = $this->userModel->countUser();

        $totalPage = ceil($totalUser / $limit);

        include(__DIR__ . '/../views/dashboard/users/index.php');
    }

    public function userDetail($idUser){
        $user = $this->userModel->getUserById($idUser);

        include(__DIR__ . '/../views/dashboard/users/detail.php');
    }
}
?>