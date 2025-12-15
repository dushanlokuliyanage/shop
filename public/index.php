<?php

require_once __DIR__ . "/../app/controllers/AuthController.php";
require_once __DIR__ . "/../app/controllers/ProfileController.php";
require_once __DIR__ . "/../app/controllers/HomeController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$AuthController = new AuthController();
$ProfController = new ProfileController();
$HomeController = new HomeController();

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
}elseif($uri == "/userUpdateProcess"){
    $ProfController->updateProfile();
}elseif($uri === "/deleteAccountProcess"){
$ProfController->deleteUser();
}elseif($uri === "/logoutUserProcess"){
    $ProfController->logoutUser();
}
else {
    echo "Page not found 404";
}
