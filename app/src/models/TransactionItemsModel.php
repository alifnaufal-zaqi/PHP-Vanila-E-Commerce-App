<?php 
namespace App\models;
use PDO;
use App\core\Model;

class TransactionItemsModel{
    protected $conn;

    public function __construct(PDO $pdo){
        $this->conn = $pdo;
    }

    public function transactionItemCount(){
        $sql = "SELECT COUNT(*) FROM transaction_items";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function getPurchasedProductsByTransactionId($idTransaction, $limit, $offset){
        $sql = "SELECT products.product_name, 
                transaction_items.price_per_item, 
                transaction_items.quantity, 
                (transaction_items.price_per_item * transaction_items.quantity) AS subtotal 
                FROM transaction_items 
                JOIN products ON transaction_items.id_product = products.id_product 
                JOIN transactions ON transaction_items.id_transaction = transactions.id_transaction 
                WHERE transactions.id_transaction = :idTransaction
                LIMIT :limit OFFSET :offset";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':idTransaction' => $idTransaction,
            ':limit' => $limit,
            ':offset' => $offset,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>