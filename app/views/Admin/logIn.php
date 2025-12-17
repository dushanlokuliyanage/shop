<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In </title>

    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body style="background-color: lightyellow;">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-4 bg-gradien p-4 shadow rounded  " style="background-color: white;">

            <form action="/adminlogInProcess" method="POST">

                <div class="row g-2">

                    <div class="col-12 mb-3">
                        <center> <samp class="title" style="font-size: x-large;">Admin LogIn</samp></center>
                    </div>

                    <?php
                    if (!empty($_SESSION['LogErrors'])) {
                        foreach ($_SESSION['LogErrors'] as $error) {
                            echo '<div class="col-12" id="errorDiv">
                                    <div class="alert alert-danger" role="alert" id="errorMsg">
                                        <div id="error">' . htmlspecialchars($error, ENT_QUOTES) . '</div>
                                    </div>
                                  </div>';
                        }
                        unset($_SESSION['LogErrors']);
                    }

                    ?>

                    <div class="col-12">
                        <lable class="form-label">Email</lable>
                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($_SESSION['LogCache'][0] ?? '', ENT_QUOTES); ?>">
                    </div>

                    <div class="col-12">
                        <lable class="form-label">Password</lable>
                        <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($_SESSION['LogCache'][1] ?? '', ENT_QUOTES); ?>">
                    </div>


                    <div class="col-12 d-grid">
                        <button class="btn btn-outline-primary">Log In</button>
                    </div>

                </div>


            </form>
        </div>
    </div>

    <?php unset($_SESSION['LogCache']); ?>

</body>

</html>