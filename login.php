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
        <div class="contenedor-login">
        <form action="loguear.php" method="POST" class="login">
            <img src="imagenes/escudo.svg" width="200px" class="escudo">
            <br>
            <input type="text" name="usuario" placeholder="Ingresa tu usuario" required>
            <br><br>
            <input type="password" name="clave" placeholder="Introduce tu clave" required>
            <br><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <?php
        // Mostrar mensaje de error si existe
        if (isset($_GET['error'])) {
            $errorMessage = $_GET['error'];
            echo "<div style='color: red;'>$errorMessage</div>";
        }
        ?>
        </div>
    </center>
</body>
</html>

