<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="registrar.css">
		
		<title>Torneo Pokémon</title>
	</head>
	<body>
		<div class="contendor">
			<main>
			<?php
			//Establezco conexión
			require 'conexion.php';

			//Obtengo los datos introducidos en el formulario anterior
			$id = $_POST["id"];
			$nombre = $_POST['nombre'];
    		$clave = $_POST['clave'];
			$ID_pokemon = $_POST["pokemon"];

			// Verifico si el nombre del participante ya existe
			$sql_check = "SELECT * FROM participantes WHERE Nombre='$nombre' AND id_participante != '$id'";
			$resultado_check = $mysqli->query($sql_check);
	
			if ($resultado_check->num_rows > 0) {
				// El participante ya existe
				header("Location: modificar.php?id=$id&error=nombre_existente");
				exit();
			}
	
			//Se repara la sentencia SQL
			$sql = "UPDATE participantes SET Nombre='$nombre',Contraseña='$clave',individuo_pokemon='$ID_pokemon' WHERE id_participante=$id";
			//Se ejecuta la sentencia y se guarda el resultado en $resultado
			$resultado = $mysqli->query($sql);

			$sql2 = "SELECT * FROM participantes WHERE id_participante LIKE '$id'";
			$resultado2 = $mysqli->query($sql2);
			$fila = $resultado2->fetch_assoc();
			
			echo "<center>";

			if($resultado > 0){
				echo "<button type='button' class='btn btn-lg btn-primary' disabled>El registro ha sido editado correctamente</button>";
			   //header("Location: index.php");
			}else{
				echo "<p class='bg-danger text-white'>Ha habido un error al modificar un registro</p>";
			}
			echo "<br>";
			echo "<button class='btn btn-primary'><a href='jugadores.php?id=$fila[id_participante]' class='text-white'> Regresar</a></button>";

			echo "</center>";
		?>
			</main>
		</div>
	</body>

</html>
