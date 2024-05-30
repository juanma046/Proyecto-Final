<?php 
    require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokemon.css">
    <title>Jugadores</title>
</head>
<body>
<?php
    //Recogemos el id del participante
    $id = $_GET['id'];
    if(!isset($id)){
        header("location:login.php");
    }else{
    //Creamos una consulta para tener toda la información referente a este participante
    $sql = "SELECT * FROM participantes WHERE id_participante=$id";
	$resultado = $mysqli->query($sql);

	//Se extrae el registro. No se hace en bucle porque el resultado deber ser único
    $fila = $resultado->fetch_assoc();
    $ID_pokemon = $fila['individuo_pokemon'];

    $sqlpoke = "SELECT * FROM pokémon WHERE id_pokemon LIKE '$ID_pokemon'";
            $resultadoP = $mysqli->query($sqlpoke);
            $fila_poke = $resultadoP->fetch_assoc();
            $nombre_pokemon = $fila_poke['Nombre'];
            $modelo = $fila_poke['Modelo'];

        echo "<h1>$fila[Nombre]</h1>";

        echo "<table id='tabla'>";
        echo "<tr>";
            echo "<th>Pokémon</th>";
            echo "<th>Jugadas</th>";
            echo "<th>Ganadas</th>";
            echo "<th>Porcentaje de Victorias</th>";
        echo "</tr>";
            echo "<tr>";
                echo "<td>$nombre_pokemon</td>";
    ?> 
        <img src="pokemon gif/<?php echo $modelo; ?>" />
    <?php
                echo "<td>$fila[Jugadas]</td>";
                echo "<td>$fila[Ganadas]</td>";
                if($fila['Ganadas']==0){
                    $media=0;
                    echo "<td>$media%</td>";
                }else{
                    $media = ($fila['Ganadas'] / $fila['Jugadas']) * 100;
                    echo "<td>$media%</td>";
                }
                //echo "<td><button class='btn btn-warning'><a href='modificar.php?id=$fila[id_participante]' class='text-white'>Cambiar pokémon</a></button></td>";
                //echo "<td><button class='btn btn-danger'><a href='eliminar.php?id=$fila[id_participante]' class='text-white'>Eliminar</a></button></td>";
            echo "</tr>";
        
        echo "</table>";
        echo "<a href='index-cliente.php'>Volver</a>";
        
        $mysqli->close();
    }
    ?>
</body>
</html>