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
        $id1 = $_POST['participante1'];
        $id2 = $_POST['participante2'];

        //Obtengo la información de ambos participantes por su id

        $sql1 = "SELECT * FROM participantes WHERE id_participante LIKE '$id1'";
        $resultado1 = $mysqli->query($sql1);
        $fila1 = $resultado1->fetch_assoc();

        //Extraemos el id del pokemon de los participantes y creamos una consulta para conseguir el nombre
        $id_poke1 = $fila1['individuo_pokemon'];
        $sqlPK1="SELECT * FROM pokémon WHERE id_pokemon LIKE '$id_poke1'";
        $resultadoPK1 = $mysqli->query($sqlPK1);
        $filaPK1 = $resultadoPK1->fetch_assoc();
        $poke1 = $filaPK1['Nombre'];
        $tipos1 = $filaPK1['Tipo'];

        
        //Repetimos todo lo anterior para el pokemon del otro participante
        $sql2 = "SELECT * FROM participantes WHERE id_participante LIKE '$id2'";
        $resultado2 = $mysqli->query($sql2);
        $fila2 = $resultado2->fetch_assoc();

        $id_poke2 = $fila2['individuo_pokemon'];
        $sqlPK2="SELECT * FROM pokémon WHERE id_pokemon LIKE '$id_poke2'";
        $resultadoPK2 = $mysqli->query($sqlPK2);
        $filaPK2 = $resultadoPK2->fetch_assoc();
        $poke2 = $filaPK2['Nombre'];
        $tipos2 = $filaPK2['Tipo'];
  
    ?>
    <h1>Que comience el combate</h1>

    <?php 
        echo "<p>$fila1[Nombre]: $poke1 ($tipos1)</p>";
        echo "<h2>VS</h2>";
        echo "<p>$fila2[Nombre]: $poke2 ($tipos2)</p>";
    ?>
</body>
</html>