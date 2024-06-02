<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="registrar.css">
    <title>Document</title>
</head>
<body>
	<div class="contenedor">
		<main>
		<?php
			//Establezco conexión
			require 'conexion.php';

			//Obtengo los datos introducidos en el formulario anterior
			$id_participante = $_GET['id'];

            //Ahora eliminaremos el id del participante pero como es clave primaria deberemos eliminar sus foreign key

            //Se repara la sentencia SQL
            $sql = "DELETE FROM enfrentamiento WHERE id_oponente1 LIKE '$id_participante' OR id_oponente2 LIKE '$id_participante'";
            //Se ejecuta la sentencia y se guarda el resultado en $resultado
            $resultado = $mysqli->query($sql);

            //$sql = "DELETE FROM individuo_pokemon WHERE id_participante LIKE '$id_participante'";
            //$resultado = $mysqli->query($sql);

			//Ahora que ya están elimanados todas las foreign key toca eliminar la primary key
			$sql = "DELETE FROM participantes WHERE id_participante LIKE '$id_participante'";
	
			//Se ejecuta la sentencia y se guarda el resultado en $resultado
			$resultado = $mysqli->query($sql);

	
			if($resultado > 0){
				echo "<button type='button' class='btn btn-lg btn-primary' disabled>El participante ha sido eliminado</button>";
			}else{
				echo "<p>Ha habido un error al añadir un registro</p>";
			}
			echo "<br>";
			echo "<button class='btn btn-primary'><a href='index.php' class='text-white'>Regresar</a></button>";
			
			
		?>
		</main>
	</div>
</body>
</html>