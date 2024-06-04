<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require 'conexion.php';

    //Obtengo los datos introducidos en el formulario anterior
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $ID_pokemon = $_POST['pokemon'];
    $rol = "usu";
    $jugadas = 0;
    $ganadas = 0;

    //Se prepara la sentencia SQL
    $sql1 = "INSERT INTO participantes (Nombre,Contraseña, Rol, individuo_pokemon, Jugadas, Ganadas) VALUES ('$nombre','$clave','$rol','$ID_pokemon','$jugadas','$ganadas')";

    //Se ejecuta la sentencia y se guarda el resultado en $resulado1
    $resultado = $mysqli->query($sql1);

    //Si se se han guardado los registros se vuelve al index
    if ($resultado > 0){
        $mysqli->close();
        header("Location:index.php");

        // Si no se ha guardado los registros mostramos un mensaje de error
    } else {
        $mysqli->close();
        echo "<div class='alert alert-danger' role='alert'>Ha habido un error al añadir el participante</div>";
        echo "<a href='registrar1.php'>Regresar</a>";
    }

    ?>
</body>
</html>