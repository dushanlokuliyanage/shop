<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($product['name']) ?> </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="stylesheet" href="/assets/css/bootstrap.css">


</head>

<body>


    <?php include __DIR__ . '/../Layouts/header.php'  ?>

    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <a href="#">
                                    <img src="/assets/images/<?= htmlspecialchars($product['image']) ?>" class="img-fluid rounded" alt="Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3"><?= htmlspecialchars($product['name']) ?></h4>
                            <p class="mb-3">Category: Fruits</p>
                            <h5 class="mb-3 d-flex" style="font-family:Verdana, Geneva, Tahoma, sans-serif">Rs.<?= htmlspecialchars($product['price']) ?>/-</h5>
                            <div class="d-flex mb-4">
                                ★★★★☆
                            </div>
                            <p class="mb-2"> <?= htmlspecialchars($product['description']) ?></p>

                            <div class="input-group quantity mb-5" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded bg-light border">
                                        -
                                    </button>
                                </div>

                                <input type="text" class="form-control form-control-sm text-center border-0" value="1">

                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded bg-light border">
                                        +
                                    </button>
                                </div>
                            </div>

                                <button class="btn btn-outline-success">Add to Cart</button>
                                <button class="btn btn-outline-secondary">Buy Now</button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Product End -->

            <!-- Related Products Start -->
            <div class="row g-4">
                <?php if (!empty($RelatedProducts) && is_array($RelatedProducts)): ?>
                    <?php foreach ($RelatedProducts as $RelatedProduct): ?>

                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="best-card" onclick="window.location='/singleProduct?id=<?= $RelatedProduct['id'] ?>';" style="cursor:pointer;">


                                <!-- Image -->
                                <div class="card mb-2">
                                    <img src="/assets/images/<?= htmlspecialchars($RelatedProduct['image']) ?>"
                                        alt="<?= htmlspecialchars($RelatedProduct['name']) ?>">
                                </div>

                                <!-- Body -->
                                <div class="card text-bg-light border-dark p-2">
                                    <h5 class="product-title">
                                        <?= htmlspecialchars($RelatedProduct['name']) ?>
                                    </h5>

                                    <p class="card-text">
                                        <?= mb_substr(htmlspecialchars($RelatedProduct['description']), 0, 70) ?>...
                                    </p>

                                    <!-- Rating -->
                                    <div>
                                        ★★★★☆
                                    </div>

                                    <!-- Price + Cart -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="price">
                                            Rs.<?= htmlspecialchars($RelatedProduct['price']) ?>/-
                                        </span>

                                        <!-- <a href="/singleProductView?product=<?= $product['id'] ?>"
                                        class="btn btn-sm btn-success">
                                    Add to cart
                                    </a> -->

                                        <a href="/singleProduct?id=<?= $RelatedProduct['id'] ?>"
                                            class="btn btn-sm btn-outline-secondary">
                                            Buy
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center text-muted">No products found.</p>
                <?php endif; ?>
            </div>
            <!-- Related Products Start -->
        </div>
    </div>



</body>

</html>