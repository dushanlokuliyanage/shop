
<?php

require_once __DIR__ . "/../models/Product.php";

class ProductController
{

    public function singleProduct()
    {

        if (!isset($_GET['id'])) {
            die("ID is missing");
        }

        $productId = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->getProductById($productId);
        $RelatedProducts = $productModel->getRelatedProducts();

        if (!$product) {
            die("Product not found");
        }
        
        require_once __DIR__ . "/../views/Product/singleProduct.php";
    }
}
