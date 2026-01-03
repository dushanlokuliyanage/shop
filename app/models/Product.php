<?php

require_once __DIR__ . "/../config/Database.php";

class Product
{

    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->setUpConn();
    }

    public function getAllProducts()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `products` LIMIT 8");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCategory()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `categories`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductById($prodId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `products` WHERE `id` = :id");
        $stmt->execute([':id' => $prodId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getRelatedProducts()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `products` LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAvarageRate($prodId)
    {

        $stmt = $this->pdo->prepare("SELECT `rating_id` FROM `products` WHERE `product_id` = :id");
        $stmt->execute(['id' => $prodId]);
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function filter($filters)
    {


        $sql = "SELECT * FROM `products` WHERE `qty` > 0";
        $params = [];

        if (!empty($filters['category'])) {
            $sql .= " AND `category_id` = :category";
            $params['category'] = $filters['category'];
        }

        if (!empty($filters['rating'])) {
            $sql .= " AND `rating_id` >= :rating";
            $params['rating'] = $filters['rating'];
        }

        if (!empty($filters['price'])) {
            $sql .= " ORDER BY `price` " . ($filters['price'] === 'low' ? 'ASC' : 'DESC');
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
