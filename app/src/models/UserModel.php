<?php
namespace App\models;

use PDO;

class UserModel{
    protected $conn;

    public function __construct(PDO $pdo){
        $this->conn = $pdo;
    }

    public function checkExistUsername($username){
        $sql = 'SELECT username FROM users WHERE username = :username';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function addUser($username, $email, $password){
        $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':role' => 'USER',
        ]);
    }

    public function getUserByEmail($email){
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch();
    }
}
?>