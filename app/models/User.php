<?php

require_once __DIR__ . "/../config/Database.php";

class User
{

    private $pdo;

    public function __construct()
    {

        $db = new Database();
        $this->pdo = $db->setUpConn();
    }


    public function findUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `email` = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function create($userData)
    {

        $stmt =  $this->pdo->prepare("INSERT INTO `users`(first_name, last_name, email, password, phone_number,address, gender, nic) VALUES (:firstName,:lastName,:email,:password,:phoneNumber, :address,:gender,:nic)");

        return $stmt->execute([
            ':firstName'  => $userData['firstName'],
            ':lastName' => $userData['lastName'],
            ':email' => $userData['email'],
            ':password' => password_hash($userData['password'], PASSWORD_BCRYPT),
            ':phoneNumber' => $userData['phoneNumber'],
            ':address' => $userData['address'],
            ':gender' =>  $userData['gender'],
            ':nic' =>  $userData['nic'],

        ]);
    }


    public function update($userData)
    {

        $stmt = $this->pdo->prepare("UPDATE  `users` SET `first_name`= ?, `last_name` = ?, `email` = ?, `phone_number` =?,`address`=?, `gender`=?, `nic`=? WHERE `id` = ?");

        return $stmt->execute([
            $userData['firstName'],
            $userData['lastName'],
            $userData['email'],
            $userData['phoneNumber'],
            $userData['address'],
            $userData['gender'],
            $userData['nic'],
            $userData['id'],

        ]);
    }

    public function delete($userData) {

        $stmt = $this->pdo->prepare("DELETE FROM `users` WHERE `id` = :id");
        $stmt->bindParam(':id', $userData['id']);
        return $stmt->execute();
    }
}
