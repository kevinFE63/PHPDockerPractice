<?php


class Category
{

    private $conn;

    private $table = 'categories';

    public $id;

    public $name;

    public $created_at;


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getCategories()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id ASC';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
