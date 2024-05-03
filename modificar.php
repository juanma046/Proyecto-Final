<?php 
    require 'conexion.php';
    $sql = "SELECT * FROM pokémon";
    $resultadoPoke = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
<?php

	$id = $_GET['id'];
	//Se prepara y ejecuta la sentencia
    $sql = "SELECT * FROM participantes WHERE id_participante=$id";
	$resultado = $mysqli->query($sql);

	//Se extrae el registro. No se hace en bucle porque el resultado deber ser único
    $fila = $resultado->fetch_assoc();
?>


		<div class="container">
			<div class="row">
				<h1><?php echo $fila['Nombre'] ?></h1>
			</div>
			
			<div class="row">
				<div class="col-md-8">
					<!-- Completar atributos de form -->
					<form id="registro" name="registro" autocomplete="off" action="modificar2.php" method="POST">
					<input type="hidden" name="id" value="<?php echo $fila['id_participante']; ?>">

						<div class="form-group">
							<!-- Pokémon -->
							<label for="pokemon" class="form-label">Pokémon</label>
                            <?php
							    echo "<select name='pokemon'>";
                                while($fila = $resultadoPoke->fetch_assoc()){
                                echo "<option value='$fila[id_pokemon]'>$fila[Nombre]</option>";
                                }
                                echo "</select>";
                            ?>
						</div>
						
						<div class="form-group">
							<!-- Editar -->
							<p><input type="submit" class="btn btn-primary" name="submit" value="Actualizar"></p>
						</div>
					</form>
				</div>
			</div>
		</div>

</html>