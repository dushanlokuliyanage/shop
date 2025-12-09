<?php
session_start();

require_once __DIR__ . "/../models/User.php";

class AuthController
{

    public function registerForm()
    {
        require_once __DIR__ . "/../views/Auth/register.php";
    }

    public function registerUser()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = new User();

            $firstName   = trim($_POST['firstName']);
            $lastName    = trim($_POST['lastName']);
            $email       = trim($_POST['email']);
            $password    = trim($_POST['password']);
            $phoneNumber = trim($_POST['phoneNumber']);
            $address     = trim($_POST['address']);
            $gender      = trim($_POST['gender']);
            $nic      = trim($_POST['nic']);

            $saved = $user->create([
                "firstName"   => $firstName,
                "lastName"    => $lastName,
                "email"       => $email,
                "password"    => $password,
                "phoneNumber" => $phoneNumber,
                "address"     => $address,
                "gender"      => $gender,
                "nic" => $nic
            ]);

            if ($saved) {
                header("Location: /logIn");
                exit();
            }
        }
    }
}
