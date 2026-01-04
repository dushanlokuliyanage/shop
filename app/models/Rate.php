<?php
require_once __DIR__ . "/../config/Database.php";

class Rating
{


    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->setUpConn();
    }


    public function storeRating($rateData)
    {

        $stmt = $this->pdo->prepare("INSERT INTO `ratings`(product_id, user_id, rating) VALUES (:productID,:user,:rating) ");

        $stmt->execute([
            ':productID'  => $rateData['id'],
            ':user'  => $rateData['user'],
            ':rating' => $rateData['rate'],

        ]);

         $this->updateProductRating($rateData['id']);
    }


    private function updateProductRating($productId)
    {
        $stmt = $this->pdo->prepare(
            "SELECT AVG(rating) AS avg_rating, COUNT(*) AS total
             FROM `ratings` WHERE product_id = :id"
        );

        $stmt->execute([':id' => $productId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->pdo->prepare(
            "UPDATE `products`
             SET `rating_id` = :avg
             WHERE `id` = :id"
        );

        $stmt->execute([
            'avg' => round($data['avg_rating'], 1),
            'id' => $productId
        ]);
    }
}
