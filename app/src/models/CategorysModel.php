<?php 
namespace App\models;
use PDO;

class CategorysModel{
    protected $conn;

    public function __construct(PDO $pdo){
        $this->conn = $pdo;
    }

    public function getAllCategorys(){
        $sql = "SELECT * FROM categorys";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}


?>