<?php 
require ("conexion.php");

// Me traigo la información de los usuarios
$sql1 = "SELECT * FROM participantes";
$resultado1 = $mysqli->query($sql1);

//Obtener los combates
$sql2 = "SELECT * FROM enfrentamiento";
$resultado2 = $mysqli->query($sql2);

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
                    </ul>
                </nav>
        </header>                         
<?php
echo "<div class='contenedor-tabla'>";
echo "<main>";
echo "<table id='lista' class='display' style='width:100%'>";
echo "<tr>";
    echo "<th>Fecha</th>";
    echo "<th>Oponente1</th>";
    echo "<th>Oponente2</th>";
    echo "<th>Ganador</th>";
echo "</tr>";

while ($fila_registro = $resultado2->fetch_assoc()) {
    //Me traigo los id de los oponentes
    $id_oponente1 = $fila_registro['id_oponente1'];
    $id_oponente2 = $fila_registro['id_oponente2'];
    //Me traigo del que es el ganador
    $id_ganador = $fila_registro['id_ganador'];
    //Busco en la base de datos sus nombres
    $sql3 = "SELECT * FROM participantes WHERE id_participante IN ('$id_oponente1','$id_oponente2','$id_ganador')";
    $resultado3 = $mysqli->query($sql3);
    //Creo un array en el que asociamos el id del participante con su nombre
    $nombres_oponentes = [];
    while ($fila3 = $resultado3->fetch_assoc()) {
        //Efectúo el uso del array y asocio el id del particioante con su nombre
        $nombres_oponentes[$fila3['id_participante']] = $fila3['Nombre'];
    }
    //$fila2['id_participante']: Este es el id de cada oponente en la base de datos.
    //$fila2['Nombre']: Este es el nombre del oponente correspondiente.
    //Entonces, esta línea básicamente toma el ID único de un oponente y lo usa como "etiqueta" para guardar su nombre en un listado. 
    //Por lo tanto, si más adelante necesitamos saber el nombre de un oponente específico, podemos buscarlo usando su ID único.
    $nombre_oponente1 = $nombres_oponentes[$id_oponente1];
    $nombre_oponente2 = $nombres_oponentes[$id_oponente2];
    echo "<tr>";     
    echo "<td>$fila_registro[fecha]</td>";
    //if($id_oponente1 == $id){
    echo "<td>$nombre_oponente1</td>";
    echo "<td>$nombre_oponente2</td>";
    //}else{//($id_oponente2 == $id){
    //echo "<td>$nombre_oponente1</td>";
    //echo "<td>Tú</td>";
    //}
    if($id_ganador == $id_oponente1){
        echo "<td>$nombre_oponente1</td>";
        }else{
        echo "<td>$nombre_oponente2</td>";
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