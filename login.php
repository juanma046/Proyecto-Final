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
    <div class="login-container">
        <center>
        <form action="loguear.php" method="POST" class="login">
            <img src="imagenes/escudo.svg" width="200px">
            <br>
            <div class="form-group">
					<!-- Nombre  -->
					<input type="text" class="form-control" id="formControlInput" name="usuario" placeholder="Ingresa tu usuario" required>
			</div>
            <br><br>
            <div class="form-group">
					<!-- Nombre  -->
					<input type="password" class="form-control" id="formControlInput" name="clave" placeholder="Ingresa tu contraseña" required>
			</div>
            <br><br>
            <p class="boton"><button type="submit" class="btn btn-primary" name="submit">Iniciar Sesión</button></p>
        </form>
        <?php
        // Mostrar mensaje de error si existe
        if (isset($_GET['error'])) {
            $errorMessage = $_GET['error'];
            echo "<div style='color: red;'>$errorMessage</div>";
        }
        ?>
        </center>
    </div>
    
</body>
</html>

