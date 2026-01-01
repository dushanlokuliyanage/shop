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

            $userModel = new User();

            $firstName   = trim($_POST['firstName']);
            $lastName    = trim($_POST['lastName']);
            $email       = trim($_POST['email']);
            $password    = trim($_POST['password']);
            $phoneNumber = trim($_POST['phoneNumber']);
            $address     = trim($_POST['address']);
            $gender      = trim($_POST['gender']);
            $nic      = trim($_POST['nic']);

            $saved = $userModel->create([
                "firstName"   => $firstName,
                "lastName"    => $lastName,
                "email"       => $email,
                "password"    => $password,
                "phoneNumber" => $phoneNumber,
                "address"     => $address,
                "gender"      => $gender,
                "nic" => $nic
            ]);


            $user = $userModel->findUserByEmail($email);

            $_SESSION['user'] =  [
                'id' => $user['id'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'phone_number' => $user['phone_number'],
                'gender' => $user['gender'],
                'address' => $user['address'],
                'nic' => $user['nic'],
            ];

            if ($saved) {
                header("Location: /logIn");
                exit();
            }
        }
    }


    public function logInForm()
    {
        require_once __DIR__ . "/../views/Auth/logIn.php";
    }

    public function logInUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $userModel = new User();
            $errors = [];

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);


            $user = $userModel->findUserByEmail($email);

            if (empty($email)) {
                $errors[] = "Enter email";
            } elseif (empty($password)) {
                $errors[] = "Enter password";
            } elseif (!$user) {
                $errors[] = "Email is wrong";
            } else {

                if (!password_verify($password, $user['password'])) {
                    $errors[] = "Password is wrong";
                }
            }

            if (!empty($errors)) {

                $cache = [$email, $password];
                $_SESSION['LogCache'] = $cache;

                $_SESSION['LogErrors'] = $errors;
                header("Location: /logIn");
                exit();
            }

         $_SESSION['user'] = $user;
            header("Location: /profile");
            exit();
        }
    }
}
