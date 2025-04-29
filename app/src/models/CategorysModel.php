<?php 
namespace App\models;
use App\core\Model;
use PDO;

class CategorysModel extends Model{
    public function __construct(PDO $pdo){
        parent::__construct($pdo);
    }

    public function getAllCategorys(){
        $data = $this->builder
                    ->select() 
                    ->from('categorys')
                    ->findAll();

        return $data;
    }
}


?>