<?php
if (!isset($_SESSION['user'])) {
    header("Location: /register");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body style="background-color: lightyellow;">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-4 bg-gradien p-5 shadow rounded  " style="background-color: white;">




            <form action="/userUpdateProcess" method="POST" id="profileForm">

                <div class="row g-2">

                    <div class="col-12 mb-5">
                        <center> <samp class="title" style="font-size: x-large;">Profile Datails</samp></center>
                    </div>


                    <div class="col-6">
                        <lable class="form-label">First Name</lable>
                        <input type="text" class="form-control" name="firstName" value="<?php echo htmlspecialchars($_SESSION['user']['first_name'] ?? '', ENT_QUOTES); ?>" disabled>
                    </div>

                    <div class="col-6">
                        <lable class="form-label">Last Name</lable>
                        <input type="text" class="form-control" name="lastName" value="<?php echo htmlspecialchars($_SESSION['user']['last_name'] ?? '', ENT_QUOTES); ?>" disabled>
                    </div>

                    <div class="col-12">
                        <lable class="form-label">Email</lable>
                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($_SESSION['user']['email'] ?? '', ENT_QUOTES); ?>" disabled>
                    </div>

                    <div class="col-12">
                        <lable class="form-label">Phone Number</lable>
                        <input type="text" class="form-control" name="phoneNumber" value="<?php echo htmlspecialchars($_SESSION['user']['phone_number'] ?? '', ENT_QUOTES); ?>" disabled>
                    </div>

                    <div class="col-12">
                        <lable class="form-label">Address</lable>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($_SESSION['user']['address'] ?? '', ENT_QUOTES); ?>" disabled>
                    </div>

                    <div class="col-6">
                        <lable class="form-label">Gender</lable>
                        <select name="gender" class="form-select" value="<?php echo htmlspecialchars($_SESSION['user']['gender'] ?? '', ENT_QUOTES); ?>" disabled>
                            <option value="Male" required>Male</option>
                            <option value="Female" required>Female</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <lable class="form-label">Nic</lable>
                        <input type="text" class="form-control" name="nic" value="<?php echo htmlspecialchars($_SESSION['user']['nic'] ?? '', ENT_QUOTES); ?>" disabled>
                    </div>

                    <div class="col-12 d-grid">
                        <button class="btn btn-outline-primary" id="updateBtn" name="updateBtn" type="button">Update</button>

                    </div>

                    <div class="col-12 d-grid">
                        <button class="btn btn-outline-success" id="saveBtn" style="display:none;" name="saveBtn" type="submit">Save</button>
                    </div>
                </div>
            </form>

            <form action="/deleteAccountProcess" onsubmit="return confirm('Are you sure you want to delete your account?');">
                <div class="col-12 d-grid">
                    <button class="btn btn-outline-danger" name="delete" type="submit">Delete Account</button>
                </div>
            </form>
        </div>
    </div>

    <form action="/logoutUserProcess" onsubmit="return confirm('Are you sure you want to logout your account?');">
        <div class="col-6 d-grid">
            <button class="btn btn-outline-success" name="delete" type="submit">Logout</button>
        </div>
    </form>
    <form action="/">
        <div class="col-6 d-grid">
            <button class="btn btn-outline-success" type="submit">Home</button>
        </div>
    </form>

    <script src="/assets/js/script.js"></script>
</body>

</html>