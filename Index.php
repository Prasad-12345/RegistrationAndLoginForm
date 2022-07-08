<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>Login</title>
</head>
<body>
    <div class="contact-form">
        <h1>Login</h1>
    </div>
    <div class="contact-us">
        <form action="SQLQuery.php" method="POST">
            <input type="email" name="email" class="form-control" placeholder="Enter email" required><br>
            <input type="text" name="password" class="form-control" placeholder="Enter password" required><br>
            <button type="submit" class="form-control submit" name="login" value="login">login</button><br>
            <button type="submit" class="form-control submit" name="register" value="register"><a href="register.php">register</a></button>
        </form>
    </div>
</body>
</html>