<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8"/>
    <title>Inloggen</title>
</head>
<body>

<!-- de action gaat naar de index, in de query string staat welke controller gerbuikt moet worden en welke method daarin uitgevoerd-->
<form action="index.php?c=user&m=login" method="POST">
    <label>username<input type="text" name="username" maxlength="40" placeholder="Email"/></label>
    <label>password<input type="password" name="password" maxlength="32" placeholder="Wachtwoord"/></label>
    <input type="submit" value="Inloggen">
</form>
</body>
</html>