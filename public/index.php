<?php

require_once __DIR__ . "/../app/controllers/AuthController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$AuthController = new AuthController();

if ($uri == "/register") {
    $AuthController->registerForm();
}elseif($uri === "/registerProcess"){
     $AuthController->registerUser();
}




else{
    echo "Page not found 404";
}
