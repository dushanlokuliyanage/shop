
<?php

require_once __DIR__ . "/../models/Product.php";
require_once __DIR__ . "/../models/Rate.php";

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
       // $productRate = $productModel->getAvarageRate($productId);
        $RelatedProducts = $productModel->getRelatedProducts();

        if (!$product) {
            die("Product not found");
        }

        require_once __DIR__ . "/../views/Product/singleProduct.php";
    }



    public function rating()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $productId = $_POST['product_id'];
            $productRating = $_POST['rating'];
            $userId = $_POST['user_id'];


            $ratingModel = new Rating();

            $ratingModel->storeRating([
                "id" => $productId,
                "user" => $userId,
                "rate" => $productRating
            ]);

            header("Location: singleProduct?id=" . $productId);
            exit();
        }
    }


    public function filterProduct()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $productModel = new Product();


            $filters = [
                'category' => $_GET['category'] ?? null,
                'price'    => $_GET['price'] ?? null,
                'rating'   => $_GET['rating'] ?? null,

            ];

            $products = $productModel->filter($filters);
            $categories = $productModel->getAllCategory();

            require_once __DIR__ . "/../views/Home/index.php";
        }
    }
}
