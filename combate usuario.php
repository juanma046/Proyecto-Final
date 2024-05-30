<?php 
require ("conexion.php");

$sql="SELECT * FROM participantes ORDER BY RAND() DESC LIMIT 1";
$resultado = $mysqli->query($sql);

?>