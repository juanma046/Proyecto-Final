<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<title>Torneo Pokémon</title>
	</head>
	<body>
		<?php
			//Establezco conexión
			require 'conexion.php';

			//Obtengo los datos introducidos en el formulario anterior
			$id = $_POST["id"];
			$ID_pokemon = $_POST["pokemon"];

            //$sqlpoke = "SELECT Nombre FROM pokémon WHERE id_pokemon LIKE '$ID_pokemon'";
            //$resultadoP = $mysqli->query($sqlpoke);

            //$fila = $resultadoP->fetch_assoc();
            //$nombre_pokemon = $fila['Nombre'];
	
			//Se repara la sentencia SQL
			$sql = "UPDATE participantes SET individuo_pokemon='$ID_pokemon' WHERE id_participante=$id";
			//Se ejecuta la sentencia y se guarda el resultado en $resultado
			$resultado = $mysqli->query($sql);

			$sql2 = "SELECT * FROM participantes WHERE id_participante LIKE '$id'";
			$resultado2 = $mysqli->query($sql2);
			$fila = $resultado2->fetch_assoc();
	
			if($resultado > 0){
				echo "<button type='button' class='btn btn-lg btn-primary' disabled>El registro ha sido editado correctamente</button>";
			   //header("Location: index.php");
			}else{
				echo "<p class='bg-danger text-white'>Ha habido un error al modificar un registro</p>";
			}
			echo "<br>";
			echo "<button class='btn btn-primary'><a href='jugadores.php?id=$fila[id_participante]' class='text-white'> Regresar</a></button>";
		?>
	</body>
</html>
