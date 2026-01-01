<?php

require_once __DIR__ . "/../models/Product.php";

class HomeController
{

    public function homeView()
    {

        $productModel = new Product();
        $prodID = $_GET['id'];
        var_dump($prodID);
        $products = $productModel->getAllProducts();


        $productRate = $productModel->getAvarageRate($prodID);
        require_once __DIR__ . "/../views/Home/index.php";
    }
}
