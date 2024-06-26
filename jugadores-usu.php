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
<div class='contenedor'> <!-- Le damos un tamaño medio de 4 a cada columna --> 
<header>  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"><!-- Boton para el menu movil -->
            <div class="container-fluid"> <!-- Determina el width y el height como 100% -->
                <img src="imagenes/escudo.svg" class="escudo">
                <div class="navbar-collapse" id="menu"><!--navbar-collapse es para agrupar el contenido de la barra de navegación pora breakpoint determinado.-->
                     <!--  navbar permite anclar la barra de navegación a la parte superior o inferior de la pantalla y que siempre sea visible -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"><!--me-auto es para centrar horizontalmente contenido de nivel de bloque de ancho fijo, es decir, contenido que tiene display: block y un conjunto width , configurando los márgenes horizontales en auto -->
                        <li class="nav-item"><a href="pokemon.php" class="nav-link">Lista de Pokemons</a></li>
                        <li class="nav-item"><a href="salir.php" class="nav-link">Cerrar sesión</a></li>
                    </ul>
                </nav>
        </header>
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
            <main class="main-carta">
            <div class="card"><!-- Creamos la card utilizando la clase card -->
                    <img src="pokemon gif/<?php echo $modelo; ?>" /> <!-- Agregamos la imagen superior usando img-top -->
            <div class="card-body"> <!-- Rellenamos la card con la clase body -->
                    <h1 class="card-title"><?php echo $nombre; ?></h1>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p>Partidas Jugadas: <?php echo $fila['Jugadas'];?></p></li>
                <li class="list-group-item"><p>Partidas Ganadas: <?php echo $fila['Ganadas'];?></p></li>
                <li class="list-group-item"><p>Media de Victorias: <?php echo $media?> %</p></li>
            </ul>
            </div>
        </div>
            </main>
    <?php     
        }else{
            $media = ($fila['Ganadas'] / $fila['Jugadas']) * 100;
            $redondeo = round($media);
            $nombre = $fila['Nombre'];
    ?>
    <div class="carta">
        <main class="main-carta">
        <div class="card"><!-- Creamos la card utilizando la clase card -->
                    <img src="pokemon gif/<?php echo $modelo; ?>" /> <!-- Agregamos la imagen superior usando img-top -->
            <div class="card-body"> <!-- Rellenamos la card con la clase body -->
                    <h1 class="card-title"><?php echo $nombre; ?></h1>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p>Partidas Jugadas: <?php echo $fila['Jugadas'];?> </p></li>
                <li class="list-group-item"><p>Partidas Ganadas: <?php echo $fila['Ganadas'];?></p></li>
                <li class="list-group-item"><p>Media de Victorias: <?php echo $redondeo?> %</p></li>
            </ul>
            </div>
        </div>
        </main>
    </div>
    </div>
    <?php     
}       
    $mysqli->close();
    }
    ?>
    <br>
    <p class="boton"><button type="submit" class="btn btn-primary" name="submit"><a href="index-cliente.php">Volver</a></button></p>

    <footer class="pie">
        <div class="pie-img"><img src="imagenes/pokemon.png"></div>
        <div class="juegos">
            <ul>
                <h3>¡¡¡Los mejores juegos!!!</h3>
                <li>Pokémon Blanco</li>
                <li>Pokémon Rojo Fuego</li>
                <li>Pokémon Zafiro Alfa</li>
            </ul>
        </div>
        <div class="social">
        <h3>Síguenos<h3>
            <ul>
                <li>
                <a href="https://www.instagram.com/pokemon/" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png"></a>
                </li>
                <li>
                <a href="https://www.facebook.com/PokemonOficialES/?locale=es_LA" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"></a>
                </li>
                <li>
                <a href="https://x.com/pokemon_es_esp" target="_blank">
                <img src="imagenes/twitter.png"></a>
                </li>
            </ul>
        </div>
    </footer>
</div>
</body>
<script src="bootstrap.bundle.min.js"></script>
</html>