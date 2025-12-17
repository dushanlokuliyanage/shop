<?php

require_once __DIR__ . "/../../models/Admin.php";

class AdminController
{
    public function logInForm()
    {
        require_once __DIR__ . "/../../views/Admin/logIn.php";
    }

    public function logIn()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $adminModel = new Admin();
            $errors = [];

            $email = trim($_POST['email']);
            $beforeEncryftPassword = trim($_POST['password']);
            $password = password_hash($beforeEncryftPassword, PASSWORD_BCRYPT);


            $user = $adminModel->findAdminByEmail($email);
            var_dump($user);

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
                header("Location: /admin");
                exit();
            }


            header("Location: /dashboard");
            exit();
        }
    }


    public function dashboard()
    {
        require_once __DIR__ . "/../../views/Admin/dashboard.php";
    }
}
