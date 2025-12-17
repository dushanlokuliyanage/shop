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
}
