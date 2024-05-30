<?php
    require 'conexion.php';
    session_start();
    $usuario = $_SESSION['username'];

    if(!isset($usuario)){
        header("location:login.php");
    }else{
    $sql1 = "SELECT * FROM participantes ORDER BY Ganadas DESC";
    $resultado1 = $mysqli->query($sql1);
    $fila1 = $resultado1->fetch_assoc();

    $sql = "SELECT * FROM participantes WHERE Nombre = '$usuario'";
    $resultado = $mysqli->query($sql);
    $fila = $resultado1->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokemon.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Torneo de Pokémon</title>
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
                        <li class="nav-item"><a href="enfrentamiento1.php" class="nav-link">Simulador de Combate</a></li>
                        <li class="nav-item"><a href="salir.php" class="nav-link">Cerrar Sesión</a></li>
                        <li class="nav-item dropdown">
                            <a 
                                href="#" 
                                class="nav-link dropdown-toggle"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                id="dropdown-menu"
                            >
                                Items
                            </a>
    
                            <ul class="dropdown-menu" aria-labelledby="dropdown-menu">
                                <li><a href="https://darksouls.fandom.com/es/wiki/Armas_de_Dark_Souls" class="dropdown-item"><img src="imagenes/espada.jpg" width="50px">Armas</a></li>
                                <li><a href="https://darksouls.fandom.com/es/wiki/Escudos_de_Dark_Souls" class="dropdown-item"><img src="imagenes/escudo.jpg" width="50px">Escudos</a></li>
                                <li><a href="https://darksouls.fandom.com/es/wiki/Armaduras_de_Dark_Souls" class="dropdown-item"><img src="imagenes/armadura.jpg" width="50px">Armaduras</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
        </header>
    <main>

    <div class="video">
        <video width="1000" height="500" autoplay loop muted>
            <source src=video/pokemon.mp4 type="video/mp4">
        </video>
    </div>
    <?php
        echo "<h2>Participantes</h2>";

        echo "<div>";
        echo "<table id='tabla'>";
        echo "<tr>";
            echo "<th>Nombre</th>";
            //echo "<th>Pokémon</th>";
            //echo "<th>Jugadas</th>";
            //echo "<th>Ganadas</th>";
            echo "<th>Puesto</th>";
        echo "</tr>";
        
        while($fila1 = $resultado1->fetch_assoc()){
            echo "<tr>";
                //echo "<td>$fila1[Nombre]</td>";
                //echo "<td>$nombre_pokemon</td>";
                //echo "<td>$fila1[Jugadas]</td>";
                //echo "<td>$fila1[Ganadas]</td>";
                echo "<td><button class='btn btn-warning'><a href='jugadores-usu.php?id=$fila1[id_participante]' class='text-white'>$fila1[Nombre]</a></button></td>";
                //echo "<td><button class='btn btn-warning'><a href='modificar.php?id=$fila1[id_participante]' class='text-white'>Cambiar pokémon</a></button></td>";
                //echo "<td><button class='btn btn-danger'><a href='eliminar.php?id=$fila1[id_participante]' class='text-white'>Eliminar</a></button></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    echo "</main>";
        
        $mysqli->close();
    ?>
    <p><a href="pokemon.php">Lista de pokémons</a></p>
    <p><a href="combate usuario.php?id=">Combates</a></p>

    <footer>
        <h2>Hola</h2>
    </footer>
</div>
</body>
</html>
?>
        <a href="salir.php"> Cerrar Sesión</a>
<?php
    }

?>