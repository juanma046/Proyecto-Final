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
        echo "<div>";
        echo "<table id='tabla'>";
        echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Tipo</th>";
            //echo "<th>Jugadas</th>";
            //echo "<th>Ganadas</th>";
            echo "<th>Win-Rate</th>";
        echo "</tr>";
        
        while($fila1 = $resultado1->fetch_assoc()){
            echo "<tr>";
                echo "<td>$fila1[Nombre]</td>";
                echo "<td>$fila1[Tipo]</td>";
                $jugadas=$fila1['Jugadas'];
                $ganadas=$fila1['Ganadas'];
                if($ganadas==0){
                    $media=0;
                    echo "<td>$media%</td>";
                }else{
                    $media = ($ganadas / $jugadas) * 100;
                    echo "<td>$media%</td>";
                }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        
        $mysqli->close();
    ?>
    <a href="index.php">Volver</a>
</body>
</html>