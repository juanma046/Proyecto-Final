<?php
require 'conexion.php';

//Creamos una funcion para insertar en la tabla enfrentamientos las veces que haya ganado el participante1
function Fgana1($id1, $id2, $fecha, $ganador1, $mysqli) {
    $sql3 = "INSERT INTO enfrentamiento (fecha, id_oponente1, id_oponente2, id_ganador) VALUES ('$fecha','$id1','$id2','$ganador1')";
    $resultadoF = $mysqli->query($sql3);
    Fupdate1($id1, $id2, $mysqli);
}

//Creamos una funcion para insertar en la tabla enfrentamientos las veces que haya ganado el participante2
function Fgana2($id1, $id2, $fecha, $ganador2, $mysqli) {
    $sql4 = "INSERT INTO enfrentamiento (fecha, id_oponente1, id_oponente2, id_ganador) VALUES ('$fecha','$id1','$id2','$ganador2')";
    $resultadoF = $mysqli->query($sql4);
    Fupdate2($id1, $id2, $mysqli);
}

//Craemos una función para hacer un update a la tabla de participantes añadiendoles una mas jugada y también a ganadas si ha ganado el participante1
function Fupdate1($id1, $id2, $mysqli) {
    // Primero incrementamos Jugadas para ambos participantes y sus pokémon
    $sql5 = "UPDATE participantes SET Jugadas = Jugadas + 1 WHERE id_participante = $id1 OR id_participante = $id2";
    $mysqli->query($sql5);

    $sql7 = "UPDATE pokémon SET Jugadas = Jugadas + 1 WHERE id_pokemon = (SELECT individuo_pokemon FROM participantes WHERE id_participante = $id1 OR id_participante = $id2)";
    $mysqli->query($sql7);

    // Luego incrementamos Ganadas solo para el ganador
    $sql6 = "UPDATE participantes SET Ganadas = Ganadas + 1 WHERE id_participante = $id1";
    $mysqli->query($sql6);

    $sql8 = "UPDATE pokémon SET Ganadas = Ganadas + 1 WHERE id_pokemon = (SELECT individuo_pokemon FROM participantes WHERE id_participante = $id1)";
    $mysqli->query($sql8);
}

function Fupdate2($id1, $id2, $mysqli) {
    // Primero incrementamos Jugadas para ambos participantes y sus pokémon
    $sql7 = "UPDATE participantes SET Jugadas = Jugadas + 1 WHERE id_participante = $id1 OR id_participante = $id2";
    $mysqli->query($sql7);

    $sql11 = "UPDATE pokémon SET Jugadas = Jugadas + 1 WHERE id_pokemon = (SELECT individuo_pokemon FROM participantes WHERE id_participante = $id1)";
    $mysqli->query($sql11);

    // Luego incrementamos Ganadas solo para el ganador
    $sql8 = "UPDATE participantes SET Ganadas = Ganadas + 1 WHERE id_participante = $id2";
    $mysqli->query($sql8);

    $sql10 = "UPDATE pokémon SET Ganadas = Ganadas + 1 WHERE id_pokemon = (SELECT individuo_pokemon FROM participantes WHERE id_participante = $id2)";
    $mysqli->query($sql10);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokemon.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
    require 'conexion.php';

    $id1 = $_POST['id_participante1'];
    $id2 = $_POST['id_participante2'];
    $fecha = date('Y-m-d');

    $sql1 = "SELECT * FROM participantes WHERE id_participante = '$id1'";
    $resultado1 = $mysqli->query($sql1);
    $fila1 = $resultado1->fetch_assoc();
    $id_poke1 = $fila1['individuo_pokemon'];
    $sqlPK1 = "SELECT * FROM pokémon WHERE id_pokemon = '$id_poke1'";
    $resultadoPK1 = $mysqli->query($sqlPK1);
    $filaPK1 = $resultadoPK1->fetch_assoc();
    $poke1 = $filaPK1['Nombre'];
    $tipos1 = $filaPK1['Tipo'];

    $sql2 = "SELECT * FROM participantes WHERE id_participante = '$id2'";
    $resultado2 = $mysqli->query($sql2);
    $fila2 = $resultado2->fetch_assoc();
    $id_poke2 = $fila2['individuo_pokemon'];
    $sqlPK2 = "SELECT * FROM pokémon WHERE id_pokemon = '$id_poke2'";
    $resultadoPK2 = $mysqli->query($sqlPK2);
    $filaPK2 = $resultadoPK2->fetch_assoc();
    $poke2 = $filaPK2['Nombre'];
    $tipos2 = $filaPK2['Tipo'];
    ?>

    <div>
        <h1>Que comience el combate</h1>
        <?php 
        echo "<p>$fila1[Nombre]: $poke1 ($tipos1)</p>";
        ?>
        <img src="pokemon gif/<?php echo $filaPK1['Modelo']; ?>" />
        <?php
        echo "<h2>VS</h2>";
        echo "<p>$fila2[Nombre]: $poke2 ($tipos2)</p>";
        ?>
        <img src="pokemon gif/<?php echo $filaPK2['Modelo']; ?>" />
        <?php 
        if ($tipos1 === "Fuego" && $tipos2 === "Planta") {
            echo "<h2>Ha ganado $fila1[Nombre]</h2>";
            $ganador1 = $id1;
            Fgana1($id1, $id2, $fecha, $ganador1, $mysqli);
        } elseif ($tipos1 === "Agua" && $tipos2 === "Fuego") {
            echo "<h2>Ha ganado $fila1[Nombre]</h2>";
            $ganador1 = $id1;
            Fgana1($id1, $id2, $fecha, $ganador1, $mysqli);
        } elseif ($tipos1 === "Planta" && $tipos2 === "Agua") {
            echo "<h2>Ha ganado $fila1[Nombre]</h2>";
            $ganador1 = $id1;
            Fgana1($id1, $id2, $fecha, $ganador1, $mysqli);
        } elseif ($tipos1 === "Electrico" && $tipos2 === "Agua") {
            echo "<h2>Ha ganado $fila1[Nombre]</h2>";
            $ganador1 = $id1;
            Fgana1($id1, $id2, $fecha, $ganador1, $mysqli);
        } elseif ($tipos1 === "Planta" && $tipos2 === "Fuego") {
            echo "<h2>Ha ganado $fila2[Nombre]</h2>";
            $ganador2 = $id2;
            Fgana2($id1, $id2, $fecha, $ganador2, $mysqli);
        } elseif ($tipos1 === "Fuego" && $tipos2 === "Agua") {
            echo "<h2>Ha ganado $fila2[Nombre]</h2>";
            $ganador2 = $id2;
            Fgana2($id1, $id2, $fecha, $ganador2, $mysqli);
        } elseif ($tipos1 === "Agua" && $tipos2 === "Planta") {
            echo "<h2>Ha ganado $fila2[Nombre]</h2>";
            $ganador2 = $id2;
            Fgana2($id1, $id2, $fecha, $ganador2, $mysqli);
        } elseif ($tipos1 === "Agua" && $tipos2 === "Electrico") {
            echo "<h2>Ha ganado $fila2[Nombre]</h2>";
            $ganador2 = $id2;
            Fgana2($id1, $id2, $fecha, $ganador2, $mysqli);
        } elseif ($tipos1 === $tipos2) {
            $ganador = rand(1, 2);
            if ($ganador == 1) {
                echo "<h2>¡El ganador es $fila1[Nombre]!</h2>";
                $ganador1 = $id1;
                Fgana1($id1, $id2, $fecha, $ganador1, $mysqli);
            } else {
                echo "<h2>¡El ganador es $fila2[Nombre]!</h2>";
                $ganador2 = $id2;
                Fgana2($id1, $id2, $fecha, $ganador2, $mysqli);
            }
        } else {
            $ganador = rand(1, 2);
            if ($ganador == 1) {
                echo "<h2>¡El ganador es $fila1[Nombre]!</h2>";
                $ganador1 = $id1;
                Fgana1($id1, $id2, $fecha, $ganador1, $mysqli);
            } else {
                echo "<h2>¡El ganador es $fila2[Nombre]!</h2>";
                $ganador2 = $id2;
                Fgana2($id1, $id2, $fecha, $ganador2, $mysqli);
            }
        }
        ?>
        <a href="index.php">Volver</a>
    </div>
</body>
</html>
