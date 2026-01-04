<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Sysco</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
</head>

<body>

    <?php include __DIR__ . '/../Layouts/header.php' ?>



    <!-- Carousel -->
    <div id="carouselExampleInterval" class="carousel slide" style="padding-top: 20px; padding-left: 35px; padding-right: 30px; padding-bottom: 50px;" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item" data-bs-interval="10000">
                <img src="/assets/images/Christmas-2025-02.png" alt="" width="1450px" height="600px">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="/assets/images/2025-Intake-banner-04.png" alt="" width="1450px" height="600px">

            </div>
            <div class="carousel-item active">
                <img src="/assets/images/MBA-WEB-banner-02.png" alt="" width="1450px" height="600px">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel -->



    <!-- BEST PRODUCTS SECTION -->
    <div class="container my-5">
        <div class="text-center mb-3">
            <p class="text-muted">Top quality items loved by customers</p>
        </div>

        <!-- Filter Section -->
        <div class="mb-3">
            <form method="GET" action="/filterProduct" class="d-flex gap-2">

            <!-- onchange="this.form.submit()" -->

                <select class="form-select form-select-sm" name="category" >
                    <option value="">All Fruits</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>">
                            <?= $cat['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <select class="form-select form-select-sm" name="price">
                    <option value="">Price</option>
                    <option value="low">Low → High</option>
                    <option value="high">High → Low</option>
                </select>

                <select class="form-select form-select-sm" name="rating">
                    <option value="">Rating</option>
                    <option value="3">3★+</option>
                    <option value="4">4★+</option>
                    <option value="5">5★</option>
                </select>

              <button class="btn btn-sm btn-outline-secondary">Filter</button> 

            </form>
        </div>
        <!-- Filter Section -->


        <div class="row g-4" >
            <?php if (!empty($products) && is_array($products)): ?>
                <?php foreach ($products as $product): ?>


                    <div class="col-sm-6 col-md-4 col-lg-3" >
                        <div class="best-card" onclick="window.location='/singleProduct?id=<?= $product['id'] ?>';" style="cursor:pointer;">

                            <input type="hidden" name="id" value="<?= $product['id'] ?>">

                            <!-- Image -->
                            <div class="card mb-2">
                                <img src="/assets/images/<?= htmlspecialchars($product['image']) ?>"
                                    alt="<?= htmlspecialchars($product['name']) ?>">
                            </div>

                            <!-- Body -->
                            <div class="card text-bg-light border-dark p-2">
                                <h5 class="product-title">
                                    <?= htmlspecialchars($product['name']) ?>
                                </h5>

                                <p class="card-text">
                                    <?= mb_substr(htmlspecialchars($product['description']), 0, 70) ?>...
                                </p>

                                <!-- Rating -->

                                <div>⭐ Rating:  <?= $product['rating_id'] ?> /5</div>



                                <!-- Price + Cart -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">
                                        Rs.<?= htmlspecialchars($product['price']) ?>/-
                                    </span>

                                    <!-- <a href="/singleProductView?product=<?= $product['id'] ?>"
                                        class="btn btn-sm btn-success">
                                    Add to cart
                                    </a> -->

                                    <a href="/singleProduct?id=<?= $product['id'] ?>"
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
    </div>



</body>

</html>