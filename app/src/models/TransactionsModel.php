<?php 
namespace App\models;
use PDO;

class TransactionsModel{
    protected $conn;

    public function __construct(PDO $pdo){
        $this->conn = $pdo;
    }

    public function transactionCount(){
        $sql = "SELECT COUNT(*) FROM transactions";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function getTransactionCount(){
        $sql = "SELECT COUNT(*) AS transaction_count FROM transactions";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTransactions($limit, $offset){
        $sql = "SELECT transactions.id_transaction, 
                users.username, 
                transactions.transaction_date, 
                transactions.total_amount 
                FROM transactions 
                JOIN users ON transactions.id_user = users.id_user 
                LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":limit" => $limit,
            ":offset" => $offset,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTransactionById($idTransaction){
        $sql = "SELECT transactions.id_transaction, 
                users.username,
                users.email,
                transactions.transaction_date, 
                transactions.total_amount 
                FROM transactions 
                JOIN users ON transactions.id_user = users.id_user 
                WHERE transactions.id_transaction = :idTransaction";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':idTransaction' => $idTransaction,
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>