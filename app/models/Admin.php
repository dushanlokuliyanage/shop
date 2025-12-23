<?php

require_once __DIR__ . "/../config/Database.php";


class Admin
{
    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->setUpConn();
    }

    public function findAdminByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `admin` WHERE `email` = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllProducts()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `products`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductCount()
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) AS total FROM `products`");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getAdminProductById($prodId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `products` WHERE `id` = :id");
        $stmt->execute([':id' => $prodId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteProductById($prodId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM `products` WHERE `id` = :id");
        $stmt->bindParam(':id', $prodId, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function getAllUsers()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `users`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserCount()
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) AS total FROM `users`");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function updateProduct($prodData)
    {

        $stmt = $this->pdo->prepare("UPDATE `products` SET `name` = ?, `description`=?, `qty` =?, `price`=? WHERE `id` = ? ");

        return $stmt->execute([

            $prodData['productName'],
            $prodData['productDes'],
            $prodData['productQty'],
            $prodData['productPrice'],
            $prodData['id'],

        ]);
    }
}
