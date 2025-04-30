<?php
namespace App\models;
use App\core\Model;
use PDO;

class UserModel extends Model{
    public function __construct(PDO $pdo){
        parent::__construct($pdo);
    }

    public function checkExistUsername($username){
        $data = $this->builder
                    ->select('username')
                    ->from('users')
                    ->where('username = ?', [$username])
                    ->execute();

        return $data;
    }

    public function addUser($username, $email, $password){
        $this->builder
            ->insert('users', [
                'id_user' => uniqid('user-'),
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role' => 'USER',
            ])
            ->execute();
    }

    public function getUserByEmail($email){
        $user = $this->builder
                    ->select()
                    ->from('users')
                    ->where('email = ?', [$email])
                    ->find();

        return $user;
    }

    public function getUserCount(){
        $userCount = $this->builder
                        ->querys('SELECT COUNT(*) AS user_count FROM users')
                        ->find();

        return $userCount;
    }

    public function getUsersInfo($limit, $offset){
        $users = $this->builder
                    ->select('users.id_user, users.username, users.email, user_profiles.address, user_profiles.gender')
                    ->from('users')
                    ->join('user_profiles', 'users.id_user = user_profiles.id_user')
                    ->limit($limit)
                    ->offset($offset)
                    ->findAll();

        return $users;
    }

    public function countUser(){
        $data = $this->builder
                    ->querys('SELECT COUNT(*) AS user_count FROM users')
                    ->findColumn();

        return $data;
    }

    public function getUserById($idUser){
        $user = $this->builder
                    ->select('users.username, users.email, user_profiles.address, user_profiles.gender, user_profiles.profile_picture')
                    ->from('users')
                    ->join('user_profiles', 'users.id_user = user_profiles.id_user')
                    ->where('users.id_user = ?', [$idUser])
                    ->find();

        return $user;
    }
}
?>