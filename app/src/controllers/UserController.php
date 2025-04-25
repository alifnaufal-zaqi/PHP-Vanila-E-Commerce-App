<?php
namespace App\controllers;
use App\models\UserModel;
use PDO;

class UserController{
    protected $userModel;

    public function __construct(PDO $pdo){
        $this->userModel = new UserModel($pdo);
    }

    public function register(){
        include(__DIR__ . '/../views/auth/register.php');
    }

    public function storeUser(){
        session_start();

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $isExistUsername = $this->userModel->checkExistUsername($username);

        if(!$isExistUsername){
            $this->userModel->addUser($username, $email, $hashedPassword);
            header('Location: /auth/login');
            exit;
        }

        $_SESSION['fail-register'] = ['message' => 'Username Already Exist'];
        header('Location: /auth/register');
        exit;
    }

    public function login(){
        include(__DIR__ . '/../views/auth/login.php');
    }

    public function verifyUserCredential(){
        session_start();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userModel->getUserByEmail($email);

        if($user && password_verify($password, $user['password'])){
            $_SESSION['user'] = $user;

            if($user['role'] === 'ADMIN'){
                header('Location: /dashboard');
                exit;
            }else{
                header('Location: /home');
                exit;
            }
        }

        $_SESSION['fail-login'] = ['message' => 'Wrong email or password'];
        header('Location: /auth/login');
        exit;
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header('Location: /auth/login');
        exit;
    }
}
?>