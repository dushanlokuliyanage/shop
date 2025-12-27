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

        $stmt = $this->pdo->prepare("SELECT ROUND(AVG(rating),1) as avg_rating FROM `ratings` WHERE `product_id` = :id");
        $stmt->execute(['id' => $prodId]);
        return  $stmt->fetch()['avg_rating'] ?? 0;
    }

}
