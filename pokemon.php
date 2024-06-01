<?php
    require 'conexion.php';

    $sql = "SELECT * FROM pokémon ORDER BY Ganadas DESC";
    $resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokemon.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <title>Document</title>
    <script>
        $(document).ready(function() {
            $('#tabla').DataTable();
        });
    </script>
</head>
<body>
<header>  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"><!-- Boton para el menu movil -->
            <div class="container-fluid"> <!-- Determina el width y el height como 100% -->
                <img src="imagenes/escudo.svg" class="escudo">
    
                
    
                
                <div class="navbar-collapse" id="menu"><!--navbar-collapse es para agrupar el contenido de la barra de navegación pora breakpoint determinado.-->
                     <!--  navbar permite anclar la barra de navegación a la parte superior o inferior de la pantalla y que siempre sea visible -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"><!--me-auto es para centrar horizontalmente contenido de nivel de bloque de ancho fijo, es decir, contenido que tiene display: block y un conjunto width , configurando los márgenes horizontales en auto -->
                        <li class="nav-item"><a href="pokemon.php" class="nav-link">Lista de Pokemons</a></li>
                        <li class="nav-item"><a href="enfrentamiento1.php" class="nav-link">Simulador de Combate</a></li>
                        <li class="nav-item"><a href="salir.php" class="nav-link">Cerrar sesión</a></li>
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
<?php
echo "<div class='contenedor-tabla'>";
echo "<main>";
echo "<table id='lista' class='display' style='width:100%'>";
echo "<tr>";
    echo "<th>Sprite</th>";
    echo "<th>Nombre</th>";
    echo "<th>Tipo</th>";
    echo "<th>Jugadas</th>";
    echo "<th>Ganadas</th>";
    echo "<th>Win-Rate</th>";
echo "</tr>";

while ($fila = $resultado->fetch_assoc()) {
    $jugadas = $fila['Jugadas'];
    $ganadas = $fila['Ganadas'];
    echo "<tr>";
    echo "<td>";
    ?>
    <img src="pokemon sprite/<?php echo $fila['sprite']; ?>" />
<?php
    echo "</td>";      
    echo "<td>$fila[Nombre]</td>";
    echo "<td>$fila[Tipo]</td>";
    echo "<td>$jugadas</td>";
    echo "<td>$ganadas</td>";
    if ($ganadas == 0) {
        $media = 0;
        echo "<td>$media %</td>";
    } else {
        $media = ($ganadas / $jugadas) * 100;
        echo "<td>$media %</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "</main>";
echo "</div>";

$mysqli->close();
?>
<p class="boton"><button type="submit" class="btn btn-primary" name="submit"><a href="index.php">Volver</a></button></p>
</body>
</html>
