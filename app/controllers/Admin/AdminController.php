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
            $password = trim($_POST['password']);

            $admin = $adminModel->findAdminByEmail($email);

            $_SESSION['admin'] = [
                'id'    => $admin['id'],
                'email' => $admin['email'],
                'role'  => $admin['role'],
                'user_name' => $admin['user_name'],

            ];


            if (empty($email)) {
                $errors[] = "Enter email";
            } elseif (empty($password)) {
                $errors[] = "Enter password";
            } elseif (!$admin) {
                $errors[] = "Email is wrong";
            } else {

                if (!password_verify($password, $admin['password'])) {
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


    public function products()
    {

        $prod = new Admin();
        $products = $prod->getAllProducts();
        $productsCount = $prod->getProductCount();

        require_once __DIR__ . "/../../views/Admin/products.php";
    }


    public function adminSingleProduct()
    {

        requireRole(['admin', 'staff', 'admin_user']);

        if (!isset($_GET['id'])) {
            die("ID is missing");
        }

        $adminProductId = $_GET['id'];
        $adminProductModel = new Admin();
        $product = $adminProductModel->getAdminProductById($adminProductId);


        if (!$product) {
            die("Product not found");
        }

        require_once __DIR__ . "/../../views/Admin/adminSingleProduct.php";
    }

    public function adminSingleUser()
    {
        if (!isset($_GET['id'])) {
            die("ID is missing");
        }

        $userId = $_GET['id'];
        $adminUserModel = new Admin();
        $user = $adminUserModel->getAdminUserById($userId);


        if (!$user) {
            die("User not found");
        }

        require_once __DIR__ . "/../../views/Admin/adminSingleUser.php";
    }

    public function  deleteProduct()
    {


        requireRole(['admin']);

        if (!isset($_GET['id'])) {
            die("ID is missing");
        }

        $adminProductId = $_GET['id'];
        $adminProductModel = new Admin();
        $deleteProduct = $adminProductModel->deleteProductById($adminProductId);


        if ($deleteProduct) {
            header("Location: /products");
            exit();
        }
    }

    public function updateProduct()
    {
        requireRole(['admin', 'staff']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $adminModul = new Admin();

            $productId = $_POST['id'];
            $productName = $_POST['productName'];
            $productPrice = $_POST['productPrice'];
            $productDes = $_POST['productDes'];
            $productQty = $_POST['productQty'];

            $imageName = $_FILES['profileImage']['name'];
            $tmpName = $_FILES['profileImage']['tmp_name'];

            $newImage =  uniqid() . "_" . $imageName;
            $uploadPath = __DIR__ . "/../../public/assets/images/" . $newImage;

            if (move_uploaded_file($tmpName, $uploadPath)) {
                $adminModul->updateProduct([
                    "image"   => $newImage,
                ]);
            }

            $saved = $adminModul->updateProduct([

                "id" => $productId,
                "productName"   => $productName,
                "productPrice"    => $productPrice,
                "productDes"       => $productDes,
                "productQty"       => $productQty,

            ]);

            if ($saved) {

                header("Location: /adminSingleProduct?id=" . $productId);
                exit();
            }
        }
    }


    public function uploadNewProductImage()
    {
        requireRole(['admin', 'staff']);

        $adminModul = new Admin();

        $productId = $_POST['id'];

        $imageName = $_FILES['profileImage']['name'];
        $tmpName = $_FILES['profileImage']['tmp_name'];

        $newImage =  uniqid() . "_" . $imageName;

        $uploadPath = __DIR__ . "/../../../public/assets/images/" . $newImage;

        $saved = false;

        if (move_uploaded_file($tmpName, $uploadPath)) {
            $saved = $adminModul->updateNewImage([
                "id" => $productId,
                "image" => $newImage
            ]);
        }

        if ($saved) {
            header("Location: /adminSingleProduct?id=" . $productId);
            exit();
        }
    }

    public function adminProfile()
    {
        require_once __DIR__ . "/../../views/Admin/adminProfile.php";
    }

    public function logoutAdmin()
    {
        if (isset($_SESSION['admin'])) {
            session_unset();
            header("Location: /admin");
            exit();
        }
    }


    public function users()
    {

        $adminModel = new Admin();
        $users = $adminModel->getAllUsers();
        $userCount = $adminModel->getUserCount();

        require_once __DIR__ . "/../../views/Admin/users.php";
    }

    public function deleteUser()
    {

        requireRole(['admin']);

        if (!isset($_GET['id'])) {
            die("ID is missing");
        }

        $userId = $_GET['id'];
        $adminModel = new Admin();
        $deleteUser = $adminModel->deleteUserById($userId);

        if ($deleteUser) {
            header("Location: /users");
            exit();
        }
    }
}
