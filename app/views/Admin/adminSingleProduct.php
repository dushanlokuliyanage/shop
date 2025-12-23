<?php $role = $_SESSION['admin']['role']; ?>

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

    <?php include __DIR__ . "/../../views/Layouts/admin.php"  ?>

    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">

                        <form action="productImage" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">

                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="/assets/images/<?= htmlspecialchars($product['image']) ?>" class="img-fluid rounded" alt="Image">
                                    </a>
                                </div>

                                <input type="file" id="fileInput" name="profileImage" accept="image/*">
                                <input type="submit" class="btn btn-outline-dark" name="upload" value="Upload">
                            </div>
                        </form>

                        <form action="/updateProductProcess" id="productForm" method="POST">

                            <input type="hidden" name="id" value="<?= $product['id'] ?>">

                            <div class="col-lg-6">
                                <label for="productName">Name</label>
                                <h4 class="fw-bold mb-3"><input type="text" value="<?= htmlspecialchars($product['name']) ?>" id="productName" name="productName" disabled></h4>
                                <p class="mb-3">Category: Fruits</p>
                                <label for="productPrice">Price</label>
                                <h5 class="mb-3 d-flex" style="font-family:Verdana, Geneva, Tahoma, sans-serif">Rs. <input type="text" value="<?= htmlspecialchars($product['price']) ?>" name="productPrice" id="ProductPrice" disabled></h5>
                                <div class="d-flex mb-4">
                                    ★★★★☆
                                </div>

                                <label for="productDes"> Qty</label>
                                <p class="mb-2">

                                <h5 class="mb-3 d-flex" style="font-family:Verdana, Geneva, Tahoma, sans-serif"><input type="text" value="<?= htmlspecialchars($product['qty']) ?>" name="productQty" id="ProductQty" disabled></h5>

                                </p>

                                <label for="productDes">Description</label>
                                <p class="mb-2">

                                    <textarea id="textarea" name="productDes" disabled><?= htmlspecialchars($product['description']) ?></textarea>

                                </p>


                                <label for="productDes"> Creted Date</label>
                                <p class="mb-2">
                                <h5 class="mb-3 d-flex" style="font-family:Verdana, Geneva, Tahoma, sans-serif"><?= htmlspecialchars($product['created_date']) ?></h5>
                                </p>

                                <label for="productDes"> Update Date</label>
                                <p class="mb-2">
                                <h5 class="mb-3 d-flex" style="font-family:Verdana, Geneva, Tahoma, sans-serif"><?= htmlspecialchars($product['update_date']) ?></h5>
                                </p>


                                <div class="d-flex">

                                    <?php if ($role === 'admin' || $role === 'staff'): ?>
                                        <button type="button"
                                            class="btn btn-outline-primary m-2"
                                            id="adminUpdateBtn"
                                            style="width: 120px;">
                                            Edit
                                        </button>
                                    <?php endif; ?>

                                    <button type="submit"
                                        class="btn btn-outline-success m-2"
                                        id="adminSaveBtn"
                                        style="display:none;width:120px;">
                                        Save
                                    </button>

                                    <?php if ($role === 'admin'): ?>

                                        <button type="submit"
                                            class="btn btn-outline-danger m-2"
                                            formaction="/deleteProductProcess?id=<?= $product['id'] ?>"
                                            formmethod="POST"
                                            onclick="return confirm('Are you sure you want to delete product?');">
                                            Delete
                                        </button>
                                    <?php endif; ?>


                                </div>


                            </div>
                    </div>
                </div>
            </div>

            <!-- Single Product End -->
        </div>
    </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("adminUpdateBtn").onclick = function() {
                let fields = document.querySelectorAll(
                    "#productForm input, #productForm textarea"
                );

                fields.forEach(field => field.disabled = false);

                document.getElementById("adminSaveBtn").style.display = "inline-block";
                this.style.display = "none";
            };
        });


        const role = "<?= $_SESSION['admin']['role'] ?>";

        if (role === 'user') {
            document.querySelectorAll("input, textarea").forEach(input => input.disabled = true);
        }
    </script>

</body>

</html>