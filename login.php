<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokemon.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <center>
        <form action="loguear.php" method="POST">
            <input type="text" name="usuario" placeholder="Ingresa tu usuario" required>
            <br><br>
            <input type="password" name="clave" placeholder="Introduce tu clave" required>
            <br><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <?php
        if (isset($_GET['error'])) {
            echo "<div style='color: red;'>" . $_GET['error'] . "</div>";
        }
        ?>
    </center>
</body>
</html>
