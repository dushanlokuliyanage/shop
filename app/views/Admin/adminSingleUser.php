<?php $role = $_SESSION['admin']['role']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body style="background-color: lightyellow;">

  <?php include __DIR__ . "/../../views/Layouts/admin.php"  ?>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-4 bg-gradien p-5 shadow rounded  " style="background-color: white;">

            <form action="/userUpdateProcess" method="POST" id="profileForm">

                <div class="row g-2">

                    <div class="col-12 mb-5">
                        <center> <samp class="title" style="font-size: x-large;">User Datails</samp></center>
                    </div>


                    <div class="col-6">
                        <lable class="form-label">First Name</lable>
                        <input type="text" class="form-control" name="firstName" value="<?= htmlspecialchars($user['first_name']) ?>" disabled>
                    </div>

                    <div class="col-6">
                        <lable class="form-label">Last Name</lable>
                        <input type="text" class="form-control" name="lastName" value="<?= htmlspecialchars($user['last_name']) ?>" disabled>
                    </div>

                    <div class="col-12">
                        <lable class="form-label">Email</lable>
                        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']) ?>" disabled>
                    </div>

                    <div class="col-12">
                        <lable class="form-label">Phone Number</lable>
                        <input type="text" class="form-control" name="phoneNumber" value="<?= htmlspecialchars($user['phone_number']) ?>" disabled>
                    </div>

                    <div class="col-12">
                        <lable class="form-label">Address</lable>
                        <input type="text" class="form-control" id="address" name="address" value="<?= htmlspecialchars($user['address']) ?>" disabled>
                    </div>

                    <div class="col-6">
                        <lable class="form-label">Gender</lable>
                        <select name="gender" class="form-select" value="<?= htmlspecialchars($user['gender']) ?>" disabled>
                            <option value="Male" required>Male</option>
                            <option value="Female" required>Female</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <lable class="form-label">Nic</lable>
                        <input type="text" class="form-control" name="nic" value="<?= htmlspecialchars($user['nic']) ?>" disabled>
                    </div>

                    <div class="col-12 d-grid">
                        <?php if ($role === 'admin' || $role === 'staff'): ?>
                            <button class="btn btn-outline-primary" id="updateBtn" name="updateBtn" type="button">Update</button>
                      <?php endif; ?>
                    </div>

                    <div class="col-12 d-grid">

                        <button class="btn btn-outline-success" id="saveBtn" style="display:none;" name="saveBtn" type="submit">Save</button>
                    </div>
                </div>
            </form>

            <form action="/deleteUserProcess?id=<?= $user['id'] ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete user ?');">
                <div class="col-12 d-grid">
                    <?php if ($role === 'admin'): ?>
                        <button class="btn btn-outline-danger" name="delete" type="submit">Delete Account</button>
                    <?php endif; ?>
                </div>
            </form>

        </div>
    </div>
    <script src="/assets/js/script.js"></script>
</body>

</html>