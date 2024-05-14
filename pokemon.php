<?php
    require 'conexion.php';

    $sql1 = "SELECT * FROM pokémon ORDER BY Ganadas DESC";
    $resultado1 = $mysqli->query($sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de los Pokémons</h1>
    <?php

        while($fila1 = $resultado1->fetch_assoc()){
            echo "<div>";
                echo "Nombre: $fila1[Nombre]";
                echo "Tipo: $fila1[Tipo]";
                $jugadas=$fila1['Jugadas'];
                $ganadas=$fila1['Ganadas'];
                if($ganadas==0){
                    $media=0;
                    echo " Win-Rate: $media%";
                }else{
                    $media = ($ganadas / $jugadas) * 100;
                    echo " Win-Rate: $media%";
                }
    ?>
                <img src="pokemon gif/<?php echo $fila1['Modelo']; ?>" />
    <?php
            echo "</div>";
        }
        
        $mysqli->close();
    ?>
    <a href="index.php">Volver</a>
</body>
</html>