<?php

require_once __DIR__ . "/../app/controllers/AuthController.php";
require_once __DIR__ . "/../app/controllers/ProfileController.php";
require_once __DIR__ . "/../app/controllers/HomeController.php";
require_once __DIR__ . "/../app/controllers/ProductController.php";
require_once __DIR__ . "/../app/controllers/Admin/AdminController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$AuthController = new AuthController();
$ProfController = new ProfileController();
$HomeController = new HomeController();
$ProductController = new ProductController();
$AdminController = new AdminController();

if ($uri === "/") {
    $HomeController->homeView();
} elseif ($uri == "/register") {
    $AuthController->registerForm();
} elseif ($uri === "/registerProcess") {
    $AuthController->registerUser();
} elseif ($uri === "/logIn") {
    $AuthController->logInForm();
} elseif ($uri === "/logInProcess") {
    $AuthController->logInUser();
} elseif ($uri === "/profile") {
    $ProfController->profile();
} elseif ($uri == "/userUpdateProcess") {
    $ProfController->updateProfile();
} elseif ($uri === "/deleteAccountProcess") {
    $ProfController->deleteUser();
} elseif ($uri === "/logoutUserProcess") {
    $ProfController->logoutUser();
} elseif ($uri === "/singleProduct") {
    $ProductController->singleProduct();
} elseif ($uri === "/admin") {
    $AdminController->logInForm();
} elseif ($uri === "/adminlogInProcess") {
    $AdminController->logIn();
} elseif ($uri === "/dashboard") {
    $AdminController->dashboard();
} else {
    echo "Page not found 404";
}
