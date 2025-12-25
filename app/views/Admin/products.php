<?php $role = $_SESSION['admin']['role']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.css">
</head>

<body>

    <?php include __DIR__ . "/../../views/Layouts/admin.php"  ?>

    <style>
        .table {
            table-layout: fixed;
            width: 100%;
        }

        .table th {
            word-wrap: break-word;
            white-space: normal;
            font-size: 11px;
        }


        .table td {
            word-wrap: break-word;
            white-space: normal;
            font-size: 13px;
        }


        .table td {
            vertical-align: middle;
        }
    </style>

    <div class="container mt-4">
        <h3>Product List - <?= htmlspecialchars($productsCount) ?> Items </h3>
        <hr>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>IMAGE</th>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                    <th>QTY</th>
                    <th>PRICE</th>
                    <?php if ($role === 'admin' || $role === 'staff'): ?>
                        <th>Edit</th>
                    <?php endif; ?>
                    
                    <?php if ($role === 'admin'): ?>
                        <th>Delete</th>
                    <?php endif; ?>

                </tr>
            </thead>

            <tbody class="text-center align-middle">
                <?php foreach ($products as $product): ?>
                    <tr>


                        <td>
                            <img src="/assets/images/<?= htmlspecialchars($product['image']) ?>" width="80" height="80" style="object-fit: cover; border-radius: 5px;">
                        </td>

                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td> <?= mb_substr(htmlspecialchars($product['description']), 0, 70) ?></td>
                        <td><?= htmlspecialchars($product['qty']) ?></td>
                        <td>Rs.<?= htmlspecialchars($product['price']) ?>/-</td>

                        <?php if ($role === 'admin' || $role === 'staff'): ?>
                            <td>
                                <button onclick="window.location='/adminSingleProduct?id=<?= $product['id'] ?>';" style="cursor:pointer;" class="btn btn-sm btn-outline-dark">Edit</button>
                            </td>
                        <?php endif; ?>

                        <?php if ($role === 'admin'): ?>
                            <td>

                                <form action="/deleteProductProcess?id=<?= $product['id'] ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete product ?');">

                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        Delete
                                    </button>

                                </form>

                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>



</body>

</html>