
<?php
	require 'conexion.php';
    $sql = "SELECT * FROM pokémon";

    $resultado = $mysqli->query($sql);
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
		
		<title>Registrar nuevo participante</title>
	</head>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- Completar atributos de form -->
					<form action="registrar2.php" method="post">
                    <div class="form-group">
						<div class="form-group">
							<!-- Nombre  -->
							<label for="formControlInput" class="form-label">Nombre del usuario</label>
							<input type="text" class="form-control" id="formControlInput" name="nombre">
						</div>

                        <div class="form-group">
							<!-- Contraseña  -->
							<label for="formControlInput" class="form-label">Contraseña</label>
							<input type="text" class="form-control" id="formControlInput" name="clave">
						</div>
						
						<div class="form-group">
							<!-- Pokémon -->
							<label for="formControlInput" class="form-label">Elige su pokémon</label>
							<?php 
                                echo "<select name='pokemon'>";
                                while($fila = $resultado->fetch_assoc()){
                                echo "<option value='$fila[id_pokemon]'>$fila[Nombre]</option>";
                                }
                                echo "</select>";
                            ?>
						</div>
						
						<div class="form-group">
							<!-- Registrar -->
							<button type="submit" class="btn btn-primary" name="submit">Registrar</button>
							<br>
					</form>
					<?php 
						echo "<br>";
						if (isset($_GET['error']) && $_GET['error'] == 'nombre_existente') {
							echo "<p class='bg-danger text-white'>El nombre de usuario ya está en uso, por favor prueba otro.</p>";
						}
					?>
				</div>
			</div>
		</div>
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.4.1.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
	</body>
</html>

