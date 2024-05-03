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
    $ID_pokemon = $_POST['pokemon'];
    $jugadas = 0;
    $ganadas = 0;

    $sqlpoke = "SELECT Nombre FROM pokémon WHERE id_pokemon LIKE '$ID_pokemon'";
    $resultadoP = $mysqli->query($sqlpoke);

    $fila = $resultadoP->fetch_assoc();
    $nombre_pokemon = $fila['Nombre'];

    //Se prepara la sentencia SQL
    $sql1 = "INSERT INTO participantes (Nombre, individuo_pokemon, Jugadas, Ganadas) VALUES ('$nombre','$nombre_pokemon','$jugadas','$ganadas')";

    //Se ejecuta la sentencia y se guarda el resultado en $resulado1
    $resultado = $mysqli->query($sql1);
//
    //$id_participante = "SELECT id_participante FROM participantes WHERE Nombre LIKE '$nombre'";
    //$result = $mysqli->query($id_participante);
//
    //////Repetimos todo lo anterior pero insertando el pokemon del participante
    //$fila = $result->fetch_assoc();
    //$sql2 = "INSERT INTO individuo_pokemon (id_participante, id_pokemon, nivel) VALUES ('$fila[id_participante]','$pokemon','$nivel')";
    //$resultado2 = $mysqli->query($sql2);

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