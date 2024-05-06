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
        $id_participante1 = $_POST['participante1'];
        $id_participante2 = $_POST['participante2'];

        
    ?>
    <p>Que comience el combate</p>
    <img src="pokemon gif/charizard.gif" alt="">
    <img src="pokemon gif/blastoise.gif" alt="" width="460px">
    <img src="pokemon gif/venusaur.gif" alt="" width="500px">
    <img src="pokemon gif/pikachu.gif" alt="" width="500px">
</body>
</html>