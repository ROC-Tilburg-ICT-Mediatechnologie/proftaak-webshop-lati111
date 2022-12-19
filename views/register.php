<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<form action="index.php?c=user&m=register" method="POST">
    <label for='username'>username</label><br>
    <input type="text" name="username" maxlength="40" required placeholder="Username"/><br>
    <label for='name'>name</label><br>
    <input type="text" name="name" maxlength="45" required placeholder="Wachtwoord"/><br>
    <label for='email'>email</label><br>
    <input type="email" name="email" maxlength="55" required placeholder="Wachtwoord"/><br>
    <label for='tel'>tel</label><br>
    <input type="tel" name="tel" required placeholder="tel"/><br>
    <label for='password'>password</label><br>
    <input type="password" name="password" maxlength="32" required placeholder="Wachtwoord"/><br>
    <label>repeat password</label><br>
    <input type="password" name="repeat_password" required maxlength="32" placeholder="Wachtwoord"/><br><br>
    <input type="submit" value="register">
</body>
</html>