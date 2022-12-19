<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8"/>
    <title>Inloggen</title>
</head>
<body>
<h1>Login</h1>
<!-- de action gaat naar de index, in de query string staat welke controller gerbuikt moet worden en welke method daarin uitgevoerd-->
<form action="index.php?c=user&m=login" method="POST">
    <label for="username">username</label><br>
    <input type="text" name="username" maxlength="40" placeholder="Username"/><br>
    <label for='password'>password</label><br>
    <input type="password" name="password" maxlength="32" placeholder="Wachtwoord"/></label><br>
    <input type="submit" value="Inloggen"><br>
    <a href="index.php?c=user&m=showRegister">register</a>
</form>
</body>
</html>