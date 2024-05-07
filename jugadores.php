<?php 
    require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
</head>
<body>
<?php
    //Recogemos el id del participante
    $id = $_GET['id'];
    //Creamos una consulta para tener toda la información referente a este participante
    $sql = "SELECT * FROM participantes WHERE id_participante=$id";
	$resultado = $mysqli->query($sql);

	//Se extrae el registro. No se hace en bucle porque el resultado deber ser único
    $fila = $resultado->fetch_assoc();
    $ID_pokemon = $fila['individuo_pokemon'];

    $sqlpoke = "SELECT Nombre FROM pokémon WHERE id_pokemon LIKE '$ID_pokemon'";
            $resultadoP = $mysqli->query($sqlpoke);
            $fila_poke = $resultadoP->fetch_assoc();
            $nombre_pokemon = $fila_poke['Nombre'];

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
                if($nombre_pokemon==="Pikachu"){
                    echo "<img src='pokemon gif/pikachu.gif'>";
                }elseif($nombre_pokemon==="Blastoise"){
                    echo "<img src='pokemon gif/blastoise.gif'>";
                }elseif($nombre_pokemon==="Venusaur"){
                    echo "<img src='pokemon gif/venusaur.gif'>";
                }elseif($nombre_pokemon==="Charizard"){
                    echo "<img src='pokemon gif/charizard.gif'>";
                }elseif($nombre_pokemon==="Garchomp"){
                    echo "<img src='pokemon gif/garchomp.gif'>";
                }elseif($nombre_pokemon==="Gengar"){
                    echo "<img src='pokemon gif/gengar.gif'>";
                }
                echo "<td>$fila[Jugadas]</td>";
                echo "<td>$fila[Ganadas]</td>";
                echo "<td><button class='btn btn-warning'><a href='modificar.php?id=$fila[id_participante]' class='text-white'>Cambiar pokémon</a></button></td>";
                echo "<td><button class='btn btn-danger'><a href='eliminar.php?id=$fila[id_participante]' class='text-white'>Eliminar</a></button></td>";
            echo "</tr>";
        
        echo "</table>";
        
        $mysqli->close();
    ?>
</body>
</html>
