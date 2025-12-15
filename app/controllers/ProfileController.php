<?php

require_once __DIR__ . "/../models/User.php";

class ProfileController
{

    public function profile()
    {
        require_once __DIR__ . "/../views/Profile/index.php";
    }

    public function updateProfile()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userId = $_SESSION['user']['id'];
            $userModel = new User();

            $firstName = trim($_POST['firstName']);
            $lastName = trim($_POST['lastName']);
            $email = trim($_POST['email']);
            $phoneNumber = trim($_POST['phoneNumber']);
            $gender = trim($_POST['gender']);
            $address = trim($_POST['address']);
            $nic = trim($_POST['nic']);

            $saved = $userModel->update([

                "id" => $userId,
                "firstName"   => $firstName,
                "lastName"    => $lastName,
                "email"       => $email,
                "phoneNumber" => $phoneNumber,
                "gender"      => $gender,
                "address"     => $address,
                "nic"     => $nic,

            ]);

            $_SESSION['user'] =  [
                'id' => $userId,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'phone_number' => $phoneNumber,
                'gender' => $gender,
                'address' => $address,
                'nic' => $nic,
            ];


            if ($saved) {
                header("Location: /profile");
                exit();
            }
        }
    }


    public function deleteUser()
    {

        $userModel = new User();
        $userId = $_SESSION['user']['id'];

        $saved = $userModel->delete([
            "id" => $userId
        ]);

        if ($saved) {
            session_unset();
            session_destroy();
            header("Location: /");
            exit();
        }
    }

    public function logoutUser() {
        if (isset($_SESSION['user'])) {
            session_unset();
            header("Location: /");
            exit();
        }
    }
}
