<?php

require_once __DIR__ . "/../models/Product.php";

class HomeController
{

    public function homeView()
    {

        $productModel = new Product();
        // $productId = $_GET['id'];
        // $productRate = $productModel->getAvarageRate($productId);
        $products = $productModel->getAllProducts();
        $categories = $productModel->getAllCategory();


        // $productRate = $productModel->getAvarageRate($prodID);
        require_once __DIR__ . "/../views/Home/index.php";
    }
}
