<?php

require_once __DIR__ . "/../models/Product.php";

class HomeController
{

    public function homeView()
    {

        $productModel = new Product();
        $products = $productModel->getAllProducts();
        require_once __DIR__ . "/../views/Home/index.php";
    }
}
