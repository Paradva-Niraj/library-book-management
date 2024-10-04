<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="icon" href="projectimg/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/adminlogin.css">
</head>
<body>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="./admin/alogin.php" method="POST">
        <h3>Login Here</h3>

        <label for="username">admin name</label>
        <input type="text" placeholder="Email" name="admin" id="username" required="">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" id="password" required="">
        <input type="submit" value="login admin" class="button" name="submit">
    </form>
</body>
</html>