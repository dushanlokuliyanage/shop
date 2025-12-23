<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
</head>
<body>
    

 <form action="/logoutAdminProcess" onsubmit="return confirm('Are you sure you want to logout?');">
        <div class="col-6 d-grid p-5">
            <button class="btn btn-outline-success" name="delete" type="submit">Logout</button>
        </div>
    </form>

</body>
</html>