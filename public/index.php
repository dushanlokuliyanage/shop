<?php

require_once __DIR__ . "/../app/controllers/AuthController.php";
require_once __DIR__ . "/../app/controllers/ProfileController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$AuthController = new AuthController();
$ProfController = new ProfileController();

if ($uri == "/register") {
    $AuthController->registerForm();
} elseif ($uri === "/registerProcess") {
    $AuthController->registerUser();
} elseif ($uri === "/logIn") {
    $AuthController->logInForm();
} elseif ($uri === "/logInProcess") {
    $AuthController->logInUser();
} elseif ($uri === "/profile") {
    $ProfController->profile();
} else {
    echo "Page not found 404";
}
