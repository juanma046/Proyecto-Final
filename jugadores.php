<?php 
    require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokemon.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
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

            if($fila['Ganadas']==0){
                $media=0;
                $nombre = $fila['Nombre'];
    ?>
    <div class="carta">
    <div class="card"><!-- Creamos la card utilizando la clase card -->
                    <img src="pokemon gif/<?php echo $modelo; ?>" /> <!-- Agregamos la imagen superior usando img-top -->
            <div class="card-body"> <!-- Rellenamos la card con la clase body -->
                    <h1 class="card-title"><?php echo $nombre; ?></h1>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p>Partidas Jugadas<?php echo $fila['Jugadas'];?></p></li>
                <li class="list-group-item"><p>Partidas Jugadas<?php echo $fila['Ganadas'];?></p></li>
                <li class="list-group-item"><p>Partidas Jugadas<?php echo $media?></p></li>
            </ul>
            </div>
        </div>
    <?php     
        }else{
            $media = ($fila['Ganadas'] / $fila['Jugadas']) * 100;
            $nombre = $fila['Nombre'];
    ?>
    <div class="carta">
    <div class="card"><!-- Creamos la card utilizando la clase card -->
                    <img src="pokemon gif/<?php echo $modelo; ?>" /> <!-- Agregamos la imagen superior usando img-top -->
            <div class="card-body"> <!-- Rellenamos la card con la clase body -->
                    <h1 class="card-title"><?php echo $nombre; ?></h1>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p>Partidas Jugadas<?php echo $fila['Jugadas'];?></p></li>
                <li class="list-group-item"><p>Partidas Jugadas<?php echo $fila['Ganadas'];?></p></li>
                <li class="list-group-item"><p>Partidas Jugadas<?php echo $media?></p></li>
            </ul>
            <button>Hol</button>
            </div>
        </div>
    </div>
    </div>
    <?php     
}
    
    echo "<a href='index.php'>Volver</a>";
        
    $mysqli->close();
    }
    ?>
</body>
<script src="bootstrap.bundle.min.js"></script>
</html>
