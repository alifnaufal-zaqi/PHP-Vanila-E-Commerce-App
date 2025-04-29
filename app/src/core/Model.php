<?php 
namespace App\core;

use App\core\QueryBuilder;
use PDO;

abstract class Model{
    protected $builder;

    public function __construct(PDO $pdo){
        $this->builder = new QueryBuilder($pdo);
    }
}


?>