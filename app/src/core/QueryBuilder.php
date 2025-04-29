<?php

namespace App\core;

use PDO;

class QueryBuilder
{
    private $conn;
    private $query = "";
    private $bindings = [];

    public function __construct(PDO $pdo)
    {
        $this->conn = $pdo;
    }

    public function querys($sql){
        $this->query .= $sql;

        return $this;
    }

    public function update($table, $data, $where)
    {
        $setPart = implode(', ', array_map(function ($key) {
            return "{$key} = ?";
        }, array_keys($data)));

        $wherePart = implode(' AND ', array_map(function ($key) {
            return "{$key} = ?";
        }, array_keys($where)));

        $this->query = "UPDATE {$table} SET {$setPart} WHERE {$wherePart}";
        $this->bindings = array_merge(array_values($data), array_values($where));

        return $this;
    }

    public function insert($table, $data)
    {
        $columns = implode(', ', array_keys($data));
        $placeholder = implode(', ', array_fill(0, count($data), '?'));
        $this->query = "INSERT INTO $table ($columns) VALUES ($placeholder)";
        $this->bindings = array_values($data);

        return $this;
    }

    public function delete($table, $condition)
    {
        $conditionPart = implode(' AND ', array_map(function ($key) {
            return "{$key} = ?";
        }, array_keys($condition)));

        $this->query = "DELETE FROM {$table} WHERE {$conditionPart}";
        $this->bindings = array_values($condition);

        return $this;
    }

    public function select($columns = '*')
    {
        $this->query .= "SELECT $columns ";

        return $this;
    }

    public function from($table)
    {
        $this->query .= "FROM $table ";

        return $this;
    }

    public function where($condition, $bindings = [])
    {
        $this->query .= "WHERE $condition ";
        $this->bindings = array_merge($this->bindings, $bindings);

        return $this;
    }

    public function join($table, $condition)
    {
        $this->query .= "JOIN $table ON $condition ";

        return $this;
    }

    public function rightJoin($table, $condition)
    {
        $this->query .= "RIGHT JOIN $table ON $condition ";

        return $this;
    }

    public function leftJoin($table, $condition)
    {
        $this->query .= "LEFT JOIN $table ON $condition ";

        return $this;
    }

    public function limit($number)
    {
        $this->query .= "LIMIT $number ";

        return $this;
    }

    public function offset($number)
    {
        $this->query .= "OFFSET $number ";

        return $this;
    }

    public function having($condition)
    {
        $this->query .= "HAVING $condition ";

        return $this;
    }

    public function orderBy($column, $direction = "ASC")
    {
        $this->query .= "ORDER BY $column $direction ";

        return $this;
    }

    public function groupBy($column)
    {
        $this->query .= "GROUP BY $column ";

        return $this;
    }

    public function like($column, $value)
    {
        $this->query .= "WHERE $column LIKE ? ";
        $this->bindings[] = "%$value%";

        return $this;
    }

    public function findAll($params = [])
    {
        $stmt = $this->conn->prepare(trim($this->query));
        $stmt->execute($params ? $params : $this->bindings);
        $this->reset();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($params = [])
    {
        $stmt = $this->conn->prepare(trim($this->query));
        $stmt->execute($params ? $params : $this->bindings);
        $this->reset();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function execute()
    {
        $stmt = $this->conn->prepare(trim($this->query));
        $stmt->execute($this->bindings);
        $this->reset();

        return $stmt->rowCount();
    }

    public function findColumn(){
        $stmt = $this->conn->prepare(trim($this->query));
        $stmt->execute();
        $this->reset();

        return $stmt->fetchColumn();
    }

    public function reset()
    {
        $this->query = "";
        $this->bindings = [];
    }
}
