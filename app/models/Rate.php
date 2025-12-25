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

        $stmt = $this->pdo->prepare("INSERT INTO `ratings`(product_id, rating) VALUES (:productID,:rating) ");

        return $stmt->execute([
            ':productID'  => $rateData['id'],
            ':rating' => $rateData['rate'],

        ]);
    }
}
