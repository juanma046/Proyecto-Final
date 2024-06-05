
<?php
	require 'conexion.php';
    $sql2 = "SELECT * FROM pokémon";

    $resultado2 = $mysqli->query($sql2);

$id = $_GET['id'];
	//Se prepara y ejecuta la sentencia
    $sql = "SELECT * FROM participantes WHERE id_participante = '$id'";
	$resultado = $mysqli->query($sql);

	//Se extrae el registro. No se hace en bucle porque el resultado deber ser único
    $fila = $resultado->fetch_assoc();
?>

<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="registrar.css">
		
		<title>Modificar la información del usuario</title>
	</head>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- Completar atributos de form -->
					<form action="modificar-yo2.php" method="post">
                    <div class="form-group">
						<div class="form-group">
							<!-- Nmbre de usuario  -->
							<label for="formControlInput" class="form-label">Introduce el nuevo nombre del usuario</label>
							<input type="hidden" name="id" value="<?php echo $fila['id_participante']; ?>">
							<input type="text" class="form-control" id="formControlInput" name="nombre" required>
						</div>

                        <div class="form-group">
							<!-- Contraseña  -->
							<label for="formControlInput" class="form-label">Introduce la nueva contraseña para el usuario</label>
							<input type="password" class="form-control" id="formControlInput" name="clave" required>
						</div>
						
						<div class="form-group">
							<!-- Pokémon -->
							<label for="formControlInput" class="form-label">Elige su nuevo pokémon</label>
							<?php 
                                echo "<select name='pokemon'>";
                                while($fila2 = $resultado2->fetch_assoc()){
                                echo "<option value='$fila2[id_pokemon]'>$fila2[Nombre]</option>";
                                }
                                echo "</select>";
                            ?>
						</div>
						
						<div class="form-group">
							<!-- Cambiar -->
							<button type="submit" class="btn btn-primary" name="submit">Cambiar</button>
					</form>
				</div>
			</div>
		</div>
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.4.1.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
	</body>
</html>
