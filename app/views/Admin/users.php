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
        <h3>Product List - <?= htmlspecialchars($userCount) ?> Items </h3>
        <hr>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>PHONE NUMBER</th>
                    <th>ADDRESS</th>
                    <th>GENDER</th>
                    <th>NIC</th>
                    <th>REGISTER DATE</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody class="text-center align-middle">
                <?php foreach ($users as $user): ?>
                    <tr>

                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['first_name']) ?></td>
                        <td><?= htmlspecialchars($user['last_name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td>Encrtypeted</td>
                        <td><?= htmlspecialchars($user['phone_number']) ?></td>
                        <td><?= htmlspecialchars($user['address']) ?></td>
                        <td><?= htmlspecialchars($user['gender']) ?></td>
                        <td><?= htmlspecialchars($user['nic']) ?></td>
                        <td><?= htmlspecialchars($user['reg_date']) ?></td>

                        <td>
                            <?php if ($role === 'admin' || $role === 'staff'): ?>
                                <button onclick="window.location='/adminSingleProduct?id=<?= $user['id'] ?>';" style="cursor:pointer;" class="btn btn-sm btn-outline-dark">Edit</button>
                            <?php endif; ?>
                        </td>
                        <td>

                            <form action="/deleteProductProcess?id=<?= $product['id'] ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete product ?');">
                                <?php if ($role === 'admin'): ?>
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        Delete
                                    </button>
                                <?php endif; ?>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>



</body>

</html>